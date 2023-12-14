<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\PemesananController;
use App\Models\Order;

class PdfController extends Controller
{
    protected $purchaseController;

    public function __construct(PemesananController $purchaseController)
    {
        $this->purchaseController = $purchaseController;
    }

    public function showCoa($id)
    {
        $order = Order::findOrFail($id);
        // $pdfData = $this->purchaseController->generateCoAPdf($order);
        $pdfPath = 'sertifikat/' . $order->id . '_certificate_of_analysis.pdf';

        return view('coa', compact('order', 'pdfPath'));
    }
}
