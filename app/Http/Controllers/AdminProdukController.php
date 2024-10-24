<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{   
    public function m_produk()
    {
        $allproduk = Product::all();
        return view("admin.m_produk", compact('allproduk'));
    }

}


