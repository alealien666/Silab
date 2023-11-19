<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('company', [
            'title' => 'Silab | Home'
        ]);
    }

    public function profil()
    {
        return view('auth.user.profile', ['title' => 'Silab | Profile']);
    }
}
