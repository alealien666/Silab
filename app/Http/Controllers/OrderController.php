<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Alat_Tambahan;
use App\Models\Lab;
use Illuminate\Http\Request;

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
        //
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
        // dd($alat);

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
