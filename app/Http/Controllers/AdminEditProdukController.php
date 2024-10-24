<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminEditProdukController extends Controller
{
    public function m_produkedit($id)
    {
        $product = Product::find($id);
        return view('admin.edit_produk', compact('product'));
    }

    public function updateproduk(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            // Produk tidak ditemukan, mungkin perlu penanganan yang sesuai seperti redirect atau pesan kesalahan
            abort(404);
        }

        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'desk' => 'required',
        ]);

        // Update data produk
        $product->nama = $request->input('nama');
        $product->harga = $request->input('harga');
        $product->deskripsi = $request->input('desk');

        // Proses upload gambar jika ada
        if ($request->hasFile('files')) {
            $gambar = $request->file('files');
            $gambar->move('image/produk/', $gambar->getClientOriginalName());
            $product->image = $gambar->getClientOriginalName();
        }

        $product->save();

        return redirect('/admin/m_produk');
    }
}