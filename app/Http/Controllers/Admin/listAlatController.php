<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat_Tambahan;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class listAlatController extends Controller
{
    public function index()
    {
        $listAlat = Alat_Tambahan::join('categories', 'categories.id', '=', 'alat_tambahans.category_id')
            ->select('alat_tambahans.id as id_alat', 'categories.category', 'jenis_alat', 'harga', 'jumlah', 'foto')
            ->get();

        $listKategori = Category::all();
        return view('auth.admin.tampilan.listAlat', compact('listAlat', 'listKategori'));
    }

    // add data alat
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori' => 'required|integer',
            'jenis_alat' => 'required|string|unique:alat_tambahans,jenis_alat',
            'jumlah' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'foto' => 'image|file|max:2000'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->file('foto')) {
            $namaBerkas = $request->file('foto')->store('public/foto-alat');
            $Alat = new Alat_Tambahan();
            $Alat->category_id = $request->input('kategori');
            $Alat->jenis_alat = $request->input('jenis_alat');
            $Alat->jumlah = $request->input('jumlah');
            $Alat->harga = $request->input('harga');
            $Alat->foto = $namaBerkas;
            $Alat->save();
        }
        return redirect()->route('Admin.list-alat.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    // update data alat
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|integer',
            'jenis_alat' => 'required|string',
            'jumlah' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'foto' => 'image|file|max:2000'
        ]);

        $Alat = Alat_Tambahan::findOrFail($id);

        if ($request->file('foto') == "") {
            $Alat->category_id = $request->kategori;
            $Alat->jenis_alat = $request->jenis_alat;
            $Alat->jumlah = $request->jumlah;
            $Alat->harga = $request->harga;
            $Alat->update();
        } else {
            File::delete("img/foto-alat/" . basename($Alat->foto));
            $namaBerkas = $request->file('foto')->store('public/foto-alat');
            $Alat->category_id = $request->kategori;
            $Alat->jenis_alat = $request->jenis_alat;
            $Alat->jumlah = $request->jumlah;
            $Alat->harga = $request->harga;
            $Alat->foto = $namaBerkas;
            $Alat->update();
        }
        return redirect()->back()->with('success', 'Data Berhasil di Perbarui');
    }

    // delete data alat
    public function destroy($id)
    {
        $Alat = Alat_Tambahan::findOrFail($id);
        // Storage::delete($Alat->photo);
        File::delete("storage/foto-alat/" . basename($Alat->foto));
        $Alat->delete();
        return redirect()->route('Admin.list-alat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
