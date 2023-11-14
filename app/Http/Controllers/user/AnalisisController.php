<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
        $analis = Analisis::orderByRaw('Rand()')->paginate(10);
        $categories = Category::all();
        if ($search === null) {
            return view('auth.user.analisis', compact('analis', 'categories'))
                ->with('title', 'Silab | Sewa Jasa Analis');
        } else {
            $analis = Analisis::where('jenis_pengujian', 'like', '%' . $search . '%')
                ->orderByRaw('Rand()')->paginate(10);
        }

        return view('auth.user.analisis', compact('analis', 'categories'))
            ->with('title', 'Silab | Sewa Jasa Analis');
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
