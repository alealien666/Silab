<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Category;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->cari;
        $categories = Category::all();

        if ($search === null) {
            $datas = Lab::get()->shuffle();
        } else {
            $datas = Lab::where('nama_lab', 'like', '%' . $search . '%')->get();
        }

        if ($datas->isEmpty()) {
            return view('produk', compact('datas', 'categories'))
                ->with('message', 'Tidak Ada Data Yang Sesuai Dengan Pencarian Anda');
        } else {
            return view('produk', compact('datas', 'categories'));
        }
    }
    public function show($slug)
    {
        $datas = Lab::where('slug', $slug)->first();
        $categories = Category::all();
        return view('detail', compact('datas', 'categories'));
    }

    public function kategori($category)
    {
        $categories = Category::all();
        $datas = Lab::whereHas('category', function ($query) use ($category) {
            $query->where('category', $category);
        })->get();

        if ($datas->isEmpty()) {
            abort(404);
        }

        return view('produk', compact('datas', 'category', 'categories'))->with('title', 'Category - ' . $category);
    }
}
