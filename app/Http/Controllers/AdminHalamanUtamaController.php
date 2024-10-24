<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHalamanUtamaController extends Controller
{
    public function halaman_utama(){
        return view('admin.halaman_utama');
    }
}
