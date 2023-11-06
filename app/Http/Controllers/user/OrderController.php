<?php


namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Alat_Tambahan;
use App\Models\detail_order;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
        // dd(session('personal_info.totalHarga'));

        $new_array = [];

        foreach ($request->input("jumlah_alat") as $key => $value) {

            if (in_array($key, $request->input("selected_alat"))) {
                // Pecah nilai string menjadi array dan tambahkan ke new_array
                $new_array[$key] = $value;
            }
        }
        // return $new_array;

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->jenis_pesanan = 'Sewa Lab';
        $order->nama_pemesan = $request->input('nama');
        $order->no_telp = $request->input('notelp');
        $order->order = now();
        $order->total_biaya = 0;
        $order->status = 'pending';
        $order->save();

        $selectedAlat = $request->input('selected_alat');
        $selectedLabId = $request->input('id_lab');



        // gae ngirim ke tabel pivot
        foreach ($selectedAlat as $index => $selectedAlatId) {
            if (is_numeric($selectedAlatId)) {
                $order->alat()->attach($selectedAlatId, [
                    'id_lab' => $selectedLabId,
                ]);
            }
        }

        $totalCost = 0;
        foreach ($selectedAlat as $selectedAlatId) {
            $alat = Alat_Tambahan::find($selectedAlatId);
            $totalCost += $alat->harga * $request->input('jumlah_alat')[$index];
        }



        $order->total_biaya = $totalCost;
        $order->save();
        // dd($totalCost);

        // iki logika gae ngurangi jumlah di tabel master
        foreach ($selectedAlat as $index => $selectedAlatId) {
            if (is_numeric($selectedAlatId)) {
                $alat = Alat_Tambahan::find($selectedAlatId);
                $alat->jumlah -= $request->input('jumlah_alat')[$index];
                $alat->save();
            }
        }

        return redirect()->back()->with('success', 'Lanjutkan untuk melakukan pembayaran.');
    }






    public function show($slug)
    {
        $selectedAlatIds = session('personal_info.selected_alat', []);
        $selectedAlat = Alat_Tambahan::whereIn('id', $selectedAlatIds)->get();
        $order = Order::all();

        $lab = Lab::where('slug', $slug)->firstOrFail();
        $categorylab = $lab->category;
        $alat = Alat_Tambahan::whereHas('category', function ($query) use ($categorylab) {
            $query->where('id', $categorylab->id);
        })->get();
        // dd($alat);
        return view('auth.user.order', compact('lab', 'categorylab', 'alat', 'selectedAlat'))->with('title', 'Silab | Order');
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
// Tandai lab sebagai tidak tersedia selama 1 hari
        // Lab::where('id', $selectedLabId)
        //     ->update(['status' => 'di gunakan' /*,'tanggal_selesai' => now()->addDays(1)*/]);
