<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (!auth()->check()) {
            return back()->with('errors', 'Anda Harus Login');
        }
        return view('index', [
            'title' => 'Dashboard',
            'parent_route' => 'Home',
            'child_route' => 'Dashboard',
        ]);
    }
}
