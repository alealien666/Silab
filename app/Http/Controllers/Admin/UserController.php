<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $dataUser  = User::all();
        $role = [];

        foreach ($dataUser as $user) {
            if ($user->role == 0) {
                $role[] = 'Super Admin';
            } elseif ($user->role == 1) {
                $role[] = 'Admin';
            } else {
                $role[] = 'Pelanggan';
            }
        }
        return view('auth.admin.tampilan.user', compact('dataUser', 'role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5|max:255',
            'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $addUser = new User;
        $addFoto = $request->file('avatar')->store('img/avatar', 'public');
        $addUser->name = $request->input('nama');
        $addUser->email = $request->input('email');
        $addUser->password = Hash::make($request->input('password'));
        $addUser->role = $request->input('role');
        $addUser->avatar = $addFoto;
        $addUser->save();

        return redirect()->back()->with('success', 'Berhasil Menambahkan User Baru');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:5|max:255',
            'avatar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $updateUser = User::findOrFail($id);
        if ($request->file('avatar') == '') {
            $updateUser->name = $request->nama;
            $updateUser->email = $request->email;
            $updateUser->password = Hash::make($request->password);
            $updateUser->role = $request->role;
            $updateUser->update();
        } else {
            File::delete('img/avatar/' . basename($updateUser->avatar));
            $updateUser->name = $request->nama;
            $updateUser->email = $request->email;
            $updateUser->password = Hash::make($request->password);
            $updateUser->role = $request->role;
            $updateUser->avatar = $request->file('avatar')->store('img/avatar');
            $updateUser->update();
        }

        return redirect()->back()->with('success', 'Berhasil Melakukan Update');
    }

    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id);
        File::delete('img/avatar/' . basename($deleteUser->avatar));
        $deleteUser->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus User');
    }
}
