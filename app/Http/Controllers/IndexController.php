<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promo;
use App\Models\About; // Import model About
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $allproduk = Product::all();
        $promo = Promo::first();
        $about = About::first(); // Ambil data About pertama
    
        // Pengecekan jika $promo adalah null
        if (!$promo) {
            $promo = new Promo;
        }
    
        return view("index", compact('allproduk', 'promo', 'about'));
    }
}

