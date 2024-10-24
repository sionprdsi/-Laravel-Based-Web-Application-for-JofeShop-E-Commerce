<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $allproduk = Cart::where('user_id', Auth::user()->id)->get();
        return view("checkout", compact('allproduk'));
    }

    public function beli(Request $request)
    {
        $allproduk = Cart::where('user_id', Auth::user()->id)->get();

        // Simpan data pesanan ke dalam tabel "orders"
        $order = Order::create([
            'invoice' => uniqid(),
            'user_id' => Auth::user()->id,
            'cart_id' => null,
            // Set cart_id to null if you don't have the cart_id in the form
            'status' => 'Menunggu Pembayaran',
            'tanggal' => now(),
            'provinsi' => $request->prov,
            'kota' => $request->kota,
            'alamat' => $request->almt,
            'kode_pos' => $request->kopos,
            'cek' => 0,
        ]);

        foreach ($allproduk as $item) {
            // Simpan data produk pesanan ke dalam tabel "order_products" (jika Anda menggunakan relasi many-to-many)
            // Atau tambahkan baris baru ke tabel "order_products" untuk setiap produk pesanan (jika Anda menggunakan tabel pivot)
            $order->products()->attach($item->product->id, ['qty' => $item->qty]);
        }

        // Membuat pesan yang berisi informasi pemesanan
        $pesan = "Halo JoFe Bakery, saya tertarik untuk memesan produk:\n";
        foreach ($allproduk as $item) {
            $pesan .= "- " . $item->product->nama . " (Qty: " . $item->qty . ")\n";
        }
        $pesan .= "\nNama: " . $request->nama;
        $pesan .= "\nAlamat: " . $request->almt . ", " . $request->kota . ", " . $request->prov;
        $pesan .= "\nTolong informasi lebih lanjut.";

        // Membuat URL untuk mengarahkan ke WhatsApp dengan pesan yang sudah terisi
        $url = 'https://wa.me/6282116154550?text=' . urlencode($pesan);

        // Menghapus data keranjang
        Cart::where('user_id', Auth::user()->id)->delete();

        return Redirect::away($url);
    }
}