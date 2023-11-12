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

        // $waktuOrder = now();
        session([
            'personal_info' => [
                'nama' => $request->input('nama'),
                'id_lab' => $request->input('id_lab'),
                'notelp' => $request->input('notelp'),
                'jenispesanan' => 'Sewa Lab',
                'masuk' => $request->input('masuk'),
                'keluar' => $request->input('keluar'),
                'lab' => $request->input('lab'),
                'selected_alat' => $selectedAlat,
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
        $order->nama_pemesan = $request->input('nama');
        $order->no_telp = $request->input('notelp');
        $order->order = $request->input('masuk');
        $order->total_biaya = 0;
        $order->status = 'pending';
        $order->save();

        $selectedLab = $request->input('id_lab');

        foreach ($selectedAlat as $index => $selectedAlatId) {
            if (is_numeric($selectedAlatId)) {
                $jumlahAlat = isset($new_array[$selectedAlatId]) ? $new_array[$selectedAlatId] : 0;
                $order->alat()->attach($selectedAlatId, [
                    'id_lab' => $selectedLab,
                    'jumlah_alat' => $jumlahAlat
                ]);
                $alat = Alat_Tambahan::find($selectedAlatId);
                $harga = $alat->harga;
                $totalBiaya = number_format($harga * $jumlahAlat, 0, ',', '.');
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

        $expiredAt = now()->addHour();
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

        $alat->each(function ($alat) {
            $alat->harga = number_format($alat->harga, 0, ',', '.');
        }); //0 untuk meng set desimal menjadi 0 di belakang harga, jika desimal ny 1 maka akan ada tambahan ,0 di belakang harga

        return view('auth.user.order', compact('lab', 'categorylab', 'alat', 'selectedAlat'))->with('title', 'Silab | Order');
    }

    public function uploadPembayaran(Request $request, $id)
    {
        $request->validate([
            'bukti' => 'required|image|mimes:jpg,jpeg,pdf,png|max:2000'
        ]);

        $upload = Order::findOrFail($id);

        $namaBerkas = $request->file('bukti')->store('img/bukti-pembayaran', 'public');
        $upload->bukti_pembayaran = $namaBerkas;
        $upload->update();
        //  elseif ($request->has('update')) {
        //     if ($request->status === 'approved' && $request->file('fileInput')) {
        //         File::delete("img/bukti-pembayaran/" . basename($verifikasi->bukti_pembayaran));
        //         $namaBerkas = $request->file('fileInput')->store('img/bukti-pembayaran', 'public');
        //         $verifikasi->status = $request->status;
        //         $verifikasi->bukti_pembayaran = $namaBerkas;

        //         $verifikasi->update();
        //     }
        // }

        return redirect()->back()->with('success', 'Berhasil Mengunggah Bukti Pembayaran.. Silahkan tunggu admin meng approve pesanan kamu');
    }

    public function updateStatus(Request $request, $id)
    {
        $upload = Lab::where($id, 'id')->firstOrFail();
        if ($request->has('submit')) {
            $upload->update(['status' => 'di gunakan']);
        }

        return redirect('/riwayat-pemesanan');
    }
}
