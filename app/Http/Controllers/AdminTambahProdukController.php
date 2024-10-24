<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminTambahProdukController extends Controller
{
    public function tm_produk()
    {
        return view("admin.tm_produk");
    }

    public function menambahproduk(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ], [
            'image.required' => 'Gambar produk harus dipilih.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diizinkan adalah JPEG, PNG, dan GIF.',
            'image.max' => 'Ukuran gambar maksimum adalah 2MB.',
            'nama.required' => 'Nama produk harus diisi.',
            'harga.required' => 'Harga produk harus diisi.',
            'deskripsi.required' => 'Deskripsi produk harus diisi.',
        ]);

        if ($request->hasFile('image')) {
            $newImageName = $request->nama . '.' . $request->image->extension();
            $request->image->move(public_path('image/produk/'), $newImageName);
        } else {
            return redirect()->back()->with('error', 'Silakan pilih gambar produk.');
        }

        $product = new Product();
        $product->kode_produk = $request->kode_produk;
        $product->nama = $request->nama;
        $product->image = $newImageName;
        $product->deskripsi = $request->deskripsi;
        $product->harga = $request->harga;
        $product->save();

        return redirect('/admin/m_produk');
    }
}
