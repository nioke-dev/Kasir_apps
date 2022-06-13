<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('pages.barang.index', [
            'title' => 'Barang',
            'parent_route' => 'Home',
            'child_route' => 'Barang',
        ]);
    }
}
