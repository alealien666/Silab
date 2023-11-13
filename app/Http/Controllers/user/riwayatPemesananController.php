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

        $jumlahAlat = detail_order::pluck('jumlah_alat', 'id_alat');
        // dd($jumlahAlat);
        return view('auth.user.riwayatPemesanan', compact('listPemesanan', 'jumlahPending', 'jumlahApproved', 'jumlahAlat'), [
            'title' => 'Silab | Riwayat Pemesanan'
        ]);
    }
}
