<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class AdminHalamanBerandaController extends Controller
{
    public function halamanBeranda()
    {
        $promo = Promo::first(); // Ambil data promo dari database sesuai kebutuhan Anda
    
        if (!$promo) {
            $promo = new Promo;
            $promo->nama = '';
            $promo->deskripsi = '';
        }
    
        return view('admin.halaman_beranda', compact('promo'));
    }

    public function updateTeksPromo(Request $request)
    {
        $id = $request->input('id');
        $promo = Promo::find($id);
    
        if (!$promo) {
            $promo = new Promo;
            $promo->id = $id; // Assign nilai id jika promo baru dibuat
        }
    
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');
    
        // Update data promo
        $promo->nama = $nama;
        $promo->deskripsi = $deskripsi;
        $promo->save();
    
        // Redirect atau berikan pesan sukses
        return redirect()->back()->with('success', 'Perubahan teks promo berhasil disimpan');
    }
    
    public function hapusTeksPromo(Request $request)
    {
        $id = $request->input('id');
        $promo = Promo::find($id);

        if (!$promo) {
            // Handle jika promo tidak ditemukan
        }

        // Hapus promo
        $promo->delete();

        // Redirect atau berikan pesan sukses
        return redirect()->back()->with('success', 'Teks promo berhasil dihapus');
    }

    public function tambahTeksPromo(Request $request)
    {
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');

        // Buat instance baru dari model Promo
        $promo = new Promo;
        $promo->nama = $nama;
        $promo->deskripsi = $deskripsi;
        $promo->save();

        // Redirect atau berikan pesan sukses
        return redirect()->back()->with('success', 'Teks promo berhasil ditambahkan');
    }
}