<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\detail_order;
use App\Models\Order;
use App\Models\Lab;
use Illuminate\Support\Facades\Auth;

class riwayatPemesananController extends Controller
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
            'users.name as nama',
        )->join('users', 'orders.user_id', '=', 'users.id')
            ->where('orders.user_id', Auth::id())
            ->whereNotNull('orders.expired_at')
            ->get();

        foreach ($listPemesanan as $index => $value) {
            $labs = Order::join('labs', 'labs.id', '=', 'orders.id_lab')
                ->select(
                    'labs.nama_lab'
                )
                ->groupBy('labs.nama_lab')
                ->where('orders.id', $value->id_pemesanan)
                ->get();

            $analis = Order::join('analises', 'analises.id', '=', 'orders.analisis_id')
                ->select('analises.jenis_pengujian')
                ->groupBy('analises.jenis_pengujian')
                ->where('orders.id', $value->id_pemesanan)->get();

            $alat = detail_order::join('alat_tambahans', 'alat_tambahans.id', '=', 'detail_orders.id_alat')
                ->select(
                    'alat_tambahans.jenis_alat',
                    'alat_tambahans.harga',
                    'detail_orders.jumlah_alat'
                )
                ->where('detail_orders.id_order', $value->id_pemesanan)
                ->get();

            $listPemesanan[$index]->labs = $labs;
            $listPemesanan[$index]->analis = $analis;
            $listPemesanan[$index]->alat = $alat;
        }
        $jumlahPending = count($listPemesanan->where('status', 'pending'));
        $jumlahApproved = count($listPemesanan->where('status', 'approved'));
        return view('auth.user.riwayatPemesanan', compact('listPemesanan', 'jumlahPending', 'jumlahApproved'), [
            'title' => 'Silab | Riwayat Pemesanan'
        ]);
    }
}
