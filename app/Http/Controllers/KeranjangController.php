<?php

// KeranjangController.php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function keranjang()
    {
        if (Auth::check()) {
            $allproduk = Cart::where('user_id', Auth::user()->id)->get();
            return view("keranjang", compact('allproduk'));
        } else {
            // Aksi ketika pengguna belum login
            // Misalnya, redirect ke halaman login
            return redirect()->route('login');
        }
    }

    public function addToCart($id)
    {
        if (Auth::check()) {
            $produk = Product::find($id);

            $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->first();

            if ($cart) {
                $cart->update([
                    'qty' => $cart->qty + 1
                ]);

                return redirect()->route('keranjang');
            } else {
                Cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                    'nama_produk' => $produk->nama,
                    'harga' => $produk->harga,
                    'qty' => 1
                ]);
                return redirect()->route('keranjang');
            }
        } else {
            // Aksi ketika pengguna belum login
            // Misalnya, redirect ke halaman login
            return redirect()->route('login');
        }
    }


    // FUNGSI MENGUPDATE JUMLAH KERANJANG
    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $request->validate([
            'qty' => 'required|numeric|min:1',
        ]);

        $cart->qty = $request->qty;
        $cart->save();

        return redirect()->route('keranjang');
    }


    // FUNGSI MENGHAPUS JUMLAH KERANJANG
    public function delete($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('keranjang');
    }
}