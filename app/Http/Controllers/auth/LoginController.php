<?php

namespace App\Http\Controllers\auth;

use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('/auth.login.index', [
            'title' => 'Silab | Sign In'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended('/lab');
        } else {
            return back()->with(['message' => 'gagal melakukan Login. Periksa kembali Email dan Password anda!!!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
