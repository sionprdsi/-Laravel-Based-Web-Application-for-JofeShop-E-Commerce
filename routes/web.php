<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AutentController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\CaraPemesananController;
use App\Http\Controllers\AdminPemesananController;
use App\Http\Controllers\AdminEditProdukController;
use App\Http\Controllers\AdminHalamanAboutController;
use App\Http\Controllers\AdminHalamanUtamaController;
use App\Http\Controllers\AdminTambahProdukController;
use App\Http\Controllers\AdminDetailPesananController;
use App\Http\Controllers\AdminHalamanBerandaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------- ------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// get
// Route::group(['middleware' => ['auth', 'checkRole:customer']], function() {
// });
Route::group(['middleware' => ['auth', 'checkRole:customer']], function () {
    //KERANJANG
    Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');
    Route::get('/keranjang/{id}', [KeranjangController::class, 'addToCart'])->name('addToCart');
    Route::put('/keranjang/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'delete'])->name('keranjang.delete');
    Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');

    // CHECKOUT
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    // POST
    Route::post('/order/process', [CheckoutController::class, 'beli'])->name('order.process');
});

// Tentang
Route::get('/about', [AboutController::class, 'about'])->name('about');

// LOGIN
Route::get('/login', [AutentController::class, 'login'])->name('login');
// POST
Route::post('/login/proses', [AutentController::class, 'Masuk']);
Route::post('/logout', [AutentController::class, 'logout']);

// REGISTER
Route::get('/register', [RegistrasiController::class, 'daftar']);
// POST
Route::post('/register/proses', [RegistrasiController::class, 'store']);

//INDEX
Route::get('/', [IndexController::class, 'index'])->name('home');

//ABOUT

//CARAPEMESANAN
Route::get('/carapemesanan', [CaraPemesananController::class, 'carapemesanan']);


// PRODUK
Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');
// DETAIL PRODUK
Route::get('/detail_produk/{id}', [ProdukController::class, 'detail'])->name('detail_produk');


// ---------------------------------------------------------------------------------------------------------------------- //
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    // get Admin
    Route::get('/admin/index', [AdminLoginController::class, 'index']);

    Route::get('/admin/halaman_utama', [AdminHalamanUtamaController::class, 'halaman_utama'])->name('admin.index');

    // DATA CUSTOMER
    Route::get('/admin/m_customer', [AdminCustomerController::class, 'm_customer']);
    Route::put('/admin/m_customer/update/{id}', [AdminCustomerController::class, 'update']);
    Route::post('/admin/m_customer/nonaktif/{id}', [AdminCustomerController::class, 'nonaktif']);
    Route::post('/admin/m_customer/aktif/{id}', [AdminCustomerController::class, 'aktif']);


    // PRODUK
    Route::get('/admin/m_produk', [AdminProdukController::class, 'm_produk']);

    //EditProduk 
    Route::get('/admin/m_produk/edit/{id}', [AdminEditProdukController::class, 'm_produkedit']);
    Route::post('/admin/m_produk/post/{id}', [AdminEditProdukController::class, 'updateproduk']);


    // TAMBAH PRODUK
    Route::get('/admin/tm_produk', [AdminTambahProdukController::class, 'tm_produk']);
    // PROSES TAMBAH PRODUK
    // post
    Route::post('/admin/proses/tm_produk', [AdminTambahProdukController::class, 'menambahproduk']);


    // EDIT HALAMAN TEKS PROMO
    Route::get('/admin/halaman_beranda', [AdminHalamanBerandaController::class, 'halamanBeranda'])->name('admin.halaman.beranda');
    Route::post('/admin/update_teks_promo', [AdminHalamanBerandaController::class, 'updateTeksPromo'])->name('update.teks.promo');
    Route::post('/admin/hapus_teks_promo', [AdminHalamanBerandaController::class, 'hapusTeksPromo'])->name('hapus.teks.promo');
    Route::post('/admin/tambah_teks_promo', [AdminHalamanBerandaController::class, 'tambahTeksPromo'])->name('tambah.teks.promo');

    // HALAMAN ABOUT
    Route::get('/admin/halaman_about', [AdminHalamanAboutController::class, 'halaman_about'])->name('admin.halaman_about');
    Route::post('/admin/halaman_about/update', [AdminHalamanAboutController::class, 'update_about'])->name('admin.halaman_about.update');

});

// // DETAIL PEMESANAN
// Route::get('/admin/detailorder/{invoice}', [AdminPemesananController::class, 'detail'])->name('admin.pemesanan.detail');
// // PEMESANAN
// Route::get('/admin/produksi', [AdminPemesananController::class, 'produksi'])->name('admin.pesanan.produksi');
// Route::get('/admin/pesanan/terima/{id}', [AdminPemesananController::class, 'terima'])->name('admin.pesanan.terima');
// Route::get('/admin/pesanan/tolak/{id}', [AdminPemesananController::class, 'tolak'])->name('admin.pesanan.tolak');

// // DETAIL PEMESANAN
// Route::get('/admin/detailorder', [AdminPemesananController::class, 'detail'])->name('admin.pemesanan.detail');
// // PEMESANAN
// Route::get('/admin/produksi', [AdminPemesananController::class, 'produksi'])->name('admin.pesanan.produksi');

// // PEMESANAN
// Route::get('/admin/produksi', [AdminPemesananController::class, 'produksi']);
// Route::get('/admin/pesanan', [AdminPemesananController::class, 'index'])->name('admin.pesanan.index');
// Route::get('/admin/pesanan/terima/{id}', [AdminPemesananController::class, 'terima'])->name('admin.pesanan.terima');
// Route::get('/admin/pesanan/tolak/{id}', [AdminPemesananController::class, 'tolak'])->name('admin.pesanan.tolak');

// Route::get('/admin/detailorder/{invoice}', [AdminPemesananController::class, 'detail'])->name('admin.pemesanan.detail');
// Route::get('/admin/pesanan/terima/{id}', [AdminPemesananController::class, 'terima'])->name('admin.pesanan.terima');
// Route::get('/admin/pesanan/tolak/{id}', [AdminPemesananController::class, 'tolak'])->name('admin.pesanan.tolak');

// //EditProduk
// Route::get('/admin/m_produk/edit/{id}', [AdminEditProdukController::class, 'm_produkedit']);
// Route::post('/admin/m_produk/post/{id}', [AdminEditProdukController::class, 'updateproduk']);

// Route::get('/admin/m_produk/edit/{id}', [AdminProdukController::class, 'm_produkedit']);
// Route::post('/admin/m_produkpost{id}', [AdminProdukController::class, 'm_produkpost']);
