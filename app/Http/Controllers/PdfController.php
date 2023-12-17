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
}
