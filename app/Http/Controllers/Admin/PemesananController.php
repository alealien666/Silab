<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\detail_order;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PemesananController extends Controller
{
    public function index()
    {
        $listPemesanan = Order::select(
            'orders.id as id_pemesanan',
            'orders.order',
            'orders.status',
            'orders.total_biaya',
            'orders.nama_pemesan',
            'orders.jenis_pesanan',
            'orders.no_telp',
            'orders.bukti_pembayaran',
            'orders.expired_at',
            'labs.nama_lab',
            'users.name as nama'
        )->join('users', 'orders.user_id', '=', 'users.id')
        ->join('labs', 'orders.id_lab', '=', 'labs.id')->get();
        foreach ($listPemesanan as $index => $value) {
            $alat = detail_order::join('alat_tambahans', 'alat_tambahans.id', '=', 'detail_orders.id_alat')
                ->select(
                    'alat_tambahans.jenis_alat',
                    'alat_tambahans.harga'
                )
                ->where('detail_orders.id_order', $value->id_pemesanan)
                ->get();
            $listPemesanan[$index]->alat = $alat;
        }

        $jumlahPending = count($listPemesanan->where('status', 'pending'));
        $jumlahApproved = count($listPemesanan->where('status', 'approved'));

        return view('auth.admin.tampilan.pemesanan', compact('listPemesanan', 'jumlahApproved', 'jumlahPending'));
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'string|required'
        ]);

        $verifikasi = Order::findOrFail($id);
        if ($request->status === 'approved') {
            $verifikasi->status = $request->status;
            $verifikasi->update();
        }

        // if ($request->has('submit')) {
        // }
        //  elseif ($request->has('update')) {
        //     if ($request->status === 'approved' && $request->file('fileInput')) {
        //         File::delete("storage/bukti-pembayaran/" . basename($verifikasi->bukti_pembayaran));
        //         $namaBerkas = $request->file('fileInput')->store('public/bukti-pembayaran');
        //         $verifikasi->status = $request->status;
        //         $verifikasi->bukti_pembayaran = $namaBerkas;

        //         $verifikasi->update();
        //     }
        // }

        return redirect()->back()->with('success', 'Pesanan Di Verifikasi');
    }
}
