<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\detail_order;
use App\Models\Order;
use App\Models\Lab;
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
            'users.name as nama'
        )->join('users', 'orders.user_id', '=', 'users.id')->get();
        foreach ($listPemesanan as $index => $value) {
            $labs = detail_order::join('labs', 'labs.id', '=', 'detail_orders.id_lab')
                ->select(
                    'labs.nama_lab'
                )
                ->groupBy('labs.nama_lab')
                ->where('detail_orders.id_order', $value->id_pemesanan)
                ->get();

            $alat = detail_order::join('alat_tambahans', 'alat_tambahans.id', '=', 'detail_orders.id_alat')
                ->select(
                    'alat_tambahans.jenis_alat',
                    'alat_tambahans.harga'
                )
                ->where('detail_orders.id_order', $value->id_pemesanan)
                ->get();
            $listPemesanan[$index]->labs = $labs;
            $listPemesanan[$index]->alat = $alat;
        }

        $jumlahPending = count($listPemesanan->where('status', 'pending'));
        $jumlahApproved = count($listPemesanan->where('status', 'approved'));

        return view('auth.admin.tampilan.pemesanan', compact('listPemesanan', 'jumlahApproved', 'jumlahPending'));
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'string|required',
            'fileInput' => 'image|file|max:2000'
        ]);

        $verifikasi = Order::findOrFail($id);

        if ($request->has('submit')) {
            $verifikasi->status = 'approved';
            $verifikasi->update();
        }

        return redirect()->back()->with('success', 'Pesanan Di Verifikasi');
    }
}
