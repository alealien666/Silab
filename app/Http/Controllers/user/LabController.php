<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LabController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->cari;
        $categories = Category::all();
        $searchDate = $request->filled('tanggal') ? $request->input('tanggal') : Carbon::now()->toDateString();

        if (!$search) {
            $datas = Lab::all();
            $usedLabsId = Order::join('labs', 'orders.id', '=', 'labs.id')
                ->whereDate('orders.order', '=', $searchDate)
                ->pluck('orders.id_lab')
                ->toArray();

            $datas = $datas->filter(function ($lab) use ($usedLabsId) {
                return !in_array($lab->id, $usedLabsId);
            });
        } elseif ($search != null) {
            $datas = Lab::where('nama_lab', 'like', '%' . $search . '%')->get();
        }

        if ($datas->isEmpty()) {
            return view('auth.user.produk', ['title' => 'Silab | Sewa Lab'], compact('datas', 'categories'))
                ->with('message', 'Tidak Ada Data Yang Sesuai Dengan Pencarian Anda');
        } else {
            return view('auth.user.produk', compact('datas', 'categories', 'searchDate'))->with('title', 'Silab | Sewa Lab');
        }
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

        return view('auth.user.produk', compact('datas', 'category', 'categories'))->with('title', 'Category - ' . $category);
    }
    public function tanggalCari(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date'
        ]);

        $searchDate = $request->input('tanggal');
        $categories = Category::all();

        $datas = Lab::all();

        $usedLabsId = Order::join('labs', 'orders.id_lab', '=', 'labs.id')
            ->whereDate('orders.order', '=', $searchDate)
            ->pluck('labs.id')
            ->toArray();

        $datas = $datas->filter(function ($lab) use ($usedLabsId) {
            return !in_array($lab->id, $usedLabsId);
        });

        return view('auth.user.produk', compact('categories', 'datas', 'searchDate'))
            ->with('title', 'Silab | Sewa Lab');
    }
}
