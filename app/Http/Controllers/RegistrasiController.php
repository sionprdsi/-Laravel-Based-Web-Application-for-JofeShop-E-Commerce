<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function daftar()
    {
        return view('register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => ['required'],
            // 'nomor' =>'required|unique:users',
            'password' => 'required',
            'telp' => 'required|min:9|max:13'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
        ]);

        return redirect('/login')->with('success', "Registrasi Behasil! Silahkan Login");
    }


}