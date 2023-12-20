<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\detail_order;
use Illuminate\Http\Request;
use App\Models\HasilAnalisis;
use App\Http\Controllers\Controller;
use App\Notifications\NotifHasilAnalisis;


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
                    'alat_tambahans.harga'
                )
                ->where('detail_orders.id_order', $value->id_pemesanan)
                ->get();

            $listPemesanan[$index]->labs = $labs;
            $listPemesanan[$index]->analis = $analis;
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

    public function entryDataHasilAnalisis(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'kondisi' => 'required|string'
        ]);

        $hasil = Order::findOrFail($id);

        $entryData = new HasilAnalisis();
        $entryData->order_id = $hasil->id;
        $entryData->status = $request->input('status');
        $entryData->kondisi_sample = $request->input('kondisi');
        $entryData->tanggal_terbit = now()->format('Y-m-d');
        $entryData->save();

        $pdfPath = $this->generateCoAPdf($hasil);

        $hasilAnalisis = HasilAnalisis::where('order_id', $hasil->id)->first();
        $notif = new NotifHasilAnalisis($hasil, $hasilAnalisis, $pdfPath);
        $hasil->user->notify($notif);

        return redirect()->back()->with('success', 'Berhasil Input Hasil');
    }

    protected function generateCoAPdf(Order $order)
    {
        $order = $order->load('hasilAnalisis');

        $pdfData = [
            'order_number' => $order->id,
            'nama_customer' => $order->nama_pemesan,
            'hasil_analisis' => [
                'status' => $order->hasilAnalisis->status,
                'tanggal_terbit' => $order->hasilAnalisis->tanggal_terbit,
                'kondisi_sample' => $order->hasilAnalisis->kondisi_sample,
            ],
        ];
        // dd($pdfData);
        $pdf = PDF::loadView('coa', $pdfData)->setOption(['defaultFont' => 'arial']);

        $pdfPath = 'sertifikat/' . $order->id . '_certificate_of_analysis.pdf';
        $fullPath = public_path($pdfPath);
        $pdf->save($fullPath);
        return $pdfPath;
    }
    public function showCoa($id)
    {
        $order = Order::with('hasilAnalisis', 'analisis')->findOrFail($id);
        $pdfPath = 'sertifikat/' . $order->id . '_certificate_of_analysis.pdf';
        return view('coa', compact('order', 'pdfPath',));
    }
    public function downloadPdf($id)
    {
        set_time_limit(180);
        $order = Order::with('hasilAnalisis', 'analisis')->findOrFail($id);
        $pdf = PDF::loadView('coa', ['order' => $order])->setOption(['defaultFont' => 'arial']);
        return $pdf->download('_certificate_of_analysis.pdf');
    }
}
