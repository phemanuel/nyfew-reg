<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function home()
    {
        return view('auth.auth-login');
    }   

    public function signin()
    {
        return view('auth.auth-login');
    }
}
