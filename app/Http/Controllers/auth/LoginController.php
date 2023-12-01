<?php

namespace App\Http\Controllers\auth;

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
            'email' => 'required|email:rfc,dns]',
            'password' => 'required|min:5|max:255'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 0) {
                return redirect()->route('Admin.list-analises.index')->with('success', 'Berhasil Login Sebagai Super Admin');
            } elseif ($user->role === 1) {
                return redirect()->route('Admin.list-analises.index')->with('success', 'Berhasil Login');
            } else if ($user->role === 2) {
                return redirect('/lab')->with('success', 'Berhasil Login');
            }
        } else {
            return back()->with('error', 'Gagal Melakukan Login. Periksa Email Dan Password Anda');
        }
    }

    public function logout(Request $request)
    {
        $role = Auth::user()->role;
        Auth::logout();
        $request->session()->invalidate();
        $redirectTo = '/';
        if ($role === 0) {
            $redirectTo = '/';
        } elseif ($role === 1) {
            $redirectTo = '/';
        } elseif ($role === 2) {
            $redirectTo = '/';
        }
        $request->session()->regenerate();
        return redirect($redirectTo);
    }
}
