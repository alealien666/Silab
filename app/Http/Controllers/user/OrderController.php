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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "nama" => "required|max:255|string",
            "notelp" => "required|numeric",
            "masuk" => ["required", "date", "after_or_equal:" . Carbon::now()->toDateString(),],
            "keluar" => ["required", "date", "after:masuk",],
            "selected_alat" => "required|array"
        ]);

        $order = new Order();
        $order->user_id = auth()->user()->id; // Gantilah dengan autentikasi pengguna yang sesuai
        $order->jenis_pesanan = 'Sewa Lab'; // Sesuaikan dengan jenis pesanan
        $order->nama_pemesan = $request->input('nama');
        $order->no_telp = $request->input('notelp');
        $order->order = now();
        $order->tanggal_selesai = $request->input('keluar');
        $order->total_biaya = 0; // Diisi nanti setelah menghitung biaya
        $order->status = 'pending';
        $order->save();

        // Hubungkan alat-alat yang dipilih dengan pesanan
        $selectedAlat = $request->input('selected_alat');
        $order->equipment()->attach($selectedAlat);

        // Hitung total biaya berdasarkan alat-alat yang dipilih
        $totalBiaya = Alat_Tambahan::whereIn('id', $selectedAlat)->sum('harga');
        $order->total_biaya = $totalBiaya;
        $order->save();

        // Tandai alat-alat sebagai tidak tersedia
        Alat_Tambahan::whereIn('id', $selectedAlat)->update(['status' => 'tidak tersedia']);

        // Tandai lab sebagai tidak tersedia selama 1 hari
        Lab::where('id', $request->input('lab_id'))
            ->update(['status' => 'tidak tersedia', 'tanggal_tersedia' => now()->addDays(1)]);

        // return redirect('/silab')->with('success', 'Pesanan Anda telah disubmit.');

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $lab = Lab::where('slug', $slug)->firstOrFail();
        $categorylab = $lab->category;
        $alat = Alat_Tambahan::whereHas('category', function ($query) use ($categorylab) {
            $query->where('id', $categorylab->id);
        })->get();
        return view('auth.user.order', compact('lab', 'categorylab', 'alat'))->with('title', 'Silab | Order');
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
