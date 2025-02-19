<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * redirect admin after login
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}