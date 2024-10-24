<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    // Menampilkan daftar produk dengan paginasi
    public function Produk()
    {
        $allproduk = Product::paginate(6); // Mengambil data produk dengan paginasi, dengan 9 item per halaman
        return view("produk", compact('allproduk'));
    }


    //detail produk
    public function detail($id)
    {
        $allproduk = Product::where('id', $id)->get();
        return view("detail_produk", compact('allproduk'));
    }

}