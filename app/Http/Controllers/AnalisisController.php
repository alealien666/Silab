<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Category;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->cari;
        $categories = Category::all();
        if ($search === null) {
            $analis = Analisis::orderByRaw('Rand()')->paginate(10);
            return view('auth.user.analisis', compact('analis', 'categories'))
                ->with('title', 'Silab | Sewa Jasa Analisis');
        } else {
            $analis = Analisis::where('jenis_pengujian', 'like', '%' . $search . '%')
                ->get();
        }

        return view('auth.user.analisis', compact('analis', 'categories'))
            ->with('title', 'Silab | Sewa Jasa Analis');
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
    public function show(analisis $analisis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(analisis $analisis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, analisis $analisis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(analisis $analisis)
    {
        //
    }

    public function kategori($category)
    {
        $categories = Category::all();
        $analis = Analisis::whereHas('category', function ($query) use ($category) {
            $query->where('category', $category);
        })->paginate(10);

        if ($analis->isEmpty()) {
            abort(404);
        }

        return view('auth.user.analisis', compact('analis', 'category', 'categories'))->with('title', 'Category - ' . $category);
    }
}
