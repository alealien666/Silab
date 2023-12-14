<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\HasilAnalisis;
use App\Http\Controllers\Controller;

class HasilAnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $hasilAnalis = Order::findOrFail($id);
    //     return view('admin.tampilan.pemesanan', compact('hasilAnalisis'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HasilAnalisis $hasilAnalisis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HasilAnalisis $hasilAnalisis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HasilAnalisis $hasilAnalisis)
    {
        //
    }
}
