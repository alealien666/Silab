<?php


namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Alat_Tambahan;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|max:255|string",
            "notelp" => "required|numeric",
            "masuk" => ["required", "date", "after_or_equal:" . Carbon::now()->toDateString()],
            "selected_alat" => "required|array",
            "jumlah_alat" => "required|array",
        ]);


        $selectedAlat = $request->input('selected_alat');
        $totalCost = 0;

        $waktuOrder = now();
        session([
            'personal_info' => [
                'nama' => $request->input('nama'),
                'notelp' => $request->input('notelp'),
                'jenispesanan' => 'Sewa Lab',
                'masuk' => $request->input('masuk'),
                'keluar' => $request->input('keluar'),
                'lab' => $request->input('lab'),
                'selected_alat' => $selectedAlat,
                'totalHarga' => $request->input('totalHarga') // jumlah harga alat yang dipesan
            ]
        ]);

        $new_array = [];
        foreach ($request->input("jumlah_alat") as $key => $value) {
            if (in_array($key, $request->input("selected_alat"))) {
                $new_array[$key] = $value;
            }
        }

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->jenis_pesanan = 'Sewa Lab';
        $order->id_lab = $request->input('id_lab');
        $order->nama_pemesan = $request->input('nama');
        $order->no_telp = $request->input('notelp');
        $order->order = now();
        $order->total_biaya = 0;
        $order->status = 'pending';
        $order->save();


        foreach ($selectedAlat as $index => $selectedAlatId) {
            if (is_numeric($selectedAlatId)) {
                $jumlahAlat = isset($new_array[$selectedAlatId]) ? $new_array[$selectedAlatId] : 0;
                $order->alat()->attach($selectedAlatId, [
                    'jumlah_alat' => $jumlahAlat
                ]);
                $alat = Alat_Tambahan::find($selectedAlatId);
                $harga = $alat->harga;
                $totalBiaya = $harga * $jumlahAlat;
                $totalCost += $totalBiaya;

                $alat->update(['jumlah' => $alat->jumlah - $jumlahAlat]);
                $jumlahAlatArray[$selectedAlatId] = $jumlahAlat;
            }
        }
        $order->total_biaya = $totalCost;
        $order->save();

        session([
            'total_biaya' => $totalCost,
            'jumlah_alat' => $jumlahAlatArray,
        ]);

        $expiredAt = now()->addMinutes(60);
        $order->expired_at = $expiredAt;
        $order->save();

        return redirect()->back()->with('success', 'Lanjutkan untuk melakukan pembayaran.');
    }

    public function show($slug)
    {
        $selectedAlatIds = session('personal_info.selected_alat', []);
        $selectedAlat = Alat_Tambahan::whereIn('id', $selectedAlatIds)->get();
        // dd($selectedAlat);
        $lab = Lab::where('slug', $slug)->firstOrFail();
        $categorylab = $lab->category;
        $alat = Alat_Tambahan::whereHas('category', function ($query) use ($categorylab) {
            $query->where('id', $categorylab->id);
        })->get();

        return view('auth.user.order', compact('lab', 'categorylab', 'alat', 'selectedAlat'))->with('title', 'Silab | Order');
    }
}
