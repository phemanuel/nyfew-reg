<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function userDashboard()
    {
        $user = auth()->user();

        return view('layout.user-dashboard');
    }
}
