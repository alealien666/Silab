<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analisis;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class listAnalisesController extends Controller
{
    public function index()
    {
        $listAnalises = Analisis::join('categories', 'categories.id', '=', 'analises.category_id')
            ->select('analises.id as id_analises', 'categories.category', 'jenis_pengujian', 'jenis_analisa', 'harga')
            ->get();

        $listKategori = Category::all();
        return view('auth.admin.tampilan.listAnalises', compact('listAnalises', 'listKategori'));
    }

    // add data jenis analises
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori' => 'required|integer',
            'jenis_analisa' => 'required|string',
            'jenis_pengujian' => 'required|string|unique:analises,jenis_pengujian',
            'harga' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $Analises = new Analisis();
        $Analises->category_id = $request->input('kategori');
        $Analises->jenis_analisa = $request->input('jenis_analisa');
        $Analises->slug = Str::slug($request->input('jenis_analisa'));
        $Analises->jenis_pengujian = $request->input('jenis_pengujian');
        $Analises->harga = $request->input('harga');
        $Analises->save();

        return redirect()->route('Admin.list-analises.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    // update data jenis analises
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|integer',
            'jenis_analisa' => 'required|string',
            'jenis_pengujian' => 'required|string',
            'harga' => 'required|numeric|min:0'
        ]);

        $Analises = Analisis::findOrFail($id);

        $Analises->category_id = $request->kategori;
        $Analises->jenis_analisa = $request->jenis_analisa;
        $Analises->jenis_pengujian = $request->jenis_pengujian;
        $Analises->harga = $request->harga;
        $Analises->update();

        return redirect()->back()->with('success', 'Data Berhasil di Perbarui');
    }

    // delete data jenis analises
    public function destroy($id)
    {
        $Analises = Analisis::findOrFail($id);
        $Analises->delete();
        return redirect()->route('Admin.list-analises.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
