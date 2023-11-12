<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class listLabsController extends Controller
{
    public function index()
    {
        $listLabs = Lab::join('categories', 'categories.id', '=', 'labs.category_id')
            ->select('labs.id as id_lab', 'categories.category', 'nama_lab', 'slug', 'kapasitas', 'status', 'foto', 'labs.deskripsi as deskripsi_lab')
            ->get();

        $listKategori = Category::all();

        return view('auth.admin.tampilan.listLabs', compact('listLabs', 'listKategori'));
    }

    // add data labs
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lab' => 'required|string|unique:labs,nama_lab',
            'kategori' => 'required|integer',
            'status_lab' => 'required|string',
            'kapasitas' => 'required|numeric|min:0',
            'foto' => 'required|image|file|max:2000',
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->file('foto')) {
            $namaBerkas = $request->file('foto')->store('img/foto-labs');
            $Lab = new Lab();
            $Lab->nama_lab = $request->input('nama_lab');
            $Lab->slug = Str::slug($request->input('nama_lab'));
            $Lab->category_id = $request->input('kategori');
            $Lab->status = $request->input('status_lab');
            $Lab->kapasitas = $request->input('kapasitas');
            $Lab->foto = $namaBerkas;
            $Lab->deskripsi = $request->input('deskripsi');
            $Lab->save();
        }
        return redirect()->route('Admin.list-labs.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    // update data labs
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lab' => 'required|string',
            'kategori' => 'required|integer',
            'status_lab' => 'required|string',
            'kapasitas' => 'required|numeric|min:0',
            'foto' => 'required|image|file|max:2000',
            'deskripsi' => 'required|string',
        ]);

        $Lab = Lab::findOrFail($id);

        if ($request->file('foto') == "") {
            $Lab->nama_lab = $request->nama_lab;
            $Lab->category_id = $request->kategori;
            $Lab->status = $request->status_lab;
            $Lab->kapasitas = $request->kapasitas;
            $Lab->slug = "slug";
            $Lab->deskripsi = $request->deskripsi;
            $Lab->update();
        } else {
            File::delete("img/foto-labs/" . basename($Lab->foto));
            $namaBerkas = $request->file('foto')->store('img/foto-labs');
            $Lab->nama_lab = $request->nama_lab;
            $Lab->category_id = $request->kategori;
            $Lab->status = $request->status_lab;
            $Lab->kapasitas = $request->kapasitas;
            $Lab->slug = "slug";
            $Lab->deskripsi = $request->deskripsi;
            $Lab->foto = $namaBerkas;
            $Lab->update();
        }
        return redirect()->back()->with('success', 'Data Berhasil di Perbarui');
    }

    // delete data alat
    public function destroy($id)
    {
        $Labs = Lab::findOrFail($id);
        File::delete("img/foto-labs/" . basename($Labs->foto));
        $Labs->delete();
        return redirect()->route('Admin.list-labs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
