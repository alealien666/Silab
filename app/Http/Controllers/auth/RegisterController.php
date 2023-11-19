<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index', [
            'title' => 'Silab | Register'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 2;
        $user->save();

        if ($user) {
            return redirect('/login')->with('success', 'Berhasil melakukan registrasi silahkan Login!!!');
        } else {
            return back()->withErrors(['msg', 'gagal melakukan registrasi']);
        }
    }
}
