<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function superadmin(){
        return view('backend.dashboard.dashboard');
    }
}
