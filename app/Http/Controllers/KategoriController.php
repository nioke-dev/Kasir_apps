<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('pages.barang.kategori', [
            'title' => 'Kategori Barang',
            'parent_route' => 'Home',
            'child_route' => 'Kategori Barang',
        ]);
    }
}
