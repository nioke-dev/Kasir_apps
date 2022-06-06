<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('pages.supplier.index', [
            'title' => 'Supplier',
            'parent_route' => 'Home',
            'child_route' => 'Supplier',
        ]);
    }
}
