<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $search = $request->cari;
    //     $categories = Category::all();

    //     if ($search === null) {
    //         $datas = Lab::get()->shuffle();
    //     } else {
    //         $datas = Lab::where('nama_lab', 'like', '%' . $search . '%')->get();
    //     }

    //     if ($datas->isEmpty()) {
    //         return view('auth.user.produk', ['title' => 'Silab | Sewa Lab'], compact('datas', 'categories'))
    //             ->with('message', 'Tidak Ada Data Yang Sesuai Dengan Pencarian Anda');
    //     } else {
    //         return view('auth.user.produk', compact('datas', 'categories'))->with('title', 'Silab | Sewa Lab');
    //     }
    // }

    public function index(Request $request)
    {
        $search = $request->cari;
        $categories = Category::all();

        // Menangani pencarian berdasarkan tanggal
        $tanggal = $request->tanggal;
        if ($tanggal) {
            $datas = Lab::whereDoesntHave('orders', function ($query) use ($tanggal) {
                $query->where('status', 'approved')
                    ->whereDate('tanggal_order', '=', $tanggal);
            })->get();
        } else {
            $datas = Lab::get()->shuffle();
        }

        if ($search === null && !$tanggal) {
            $datas = Lab::get()->shuffle();
        } elseif ($search !== null && !$tanggal) {
            $datas = Lab::where('nama_lab', 'like', '%' . $search . '%')->get();
        }

        if ($datas->isEmpty()) {
            return view('auth.user.produk', ['title' => 'Silab | Sewa Lab'], compact('datas', 'categories'))
                ->with('message', 'Tidak Ada Data Yang Sesuai Dengan Pencarian Anda');
        } else {
            return view('auth.user.produk', compact('datas', 'categories'))->with('title', 'Silab | Sewa Lab');
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

        $usedLabsId = Order::join('labs', 'orders.id', '=', 'labs.id')
            ->whereDate('orders.order', '=', $searchDate)
            ->pluck('orders.id_lab')
            ->toArray();

        $datas = $datas->filter(function ($lab) use ($usedLabsId) {
            return !in_array($lab->id, $usedLabsId);
        });

        return view('auth.user.produk', compact('categories', 'datas'))
            ->with(['title' => 'Silab | Sewa Lab', 'tanggal' => $searchDate]);
    }
}
