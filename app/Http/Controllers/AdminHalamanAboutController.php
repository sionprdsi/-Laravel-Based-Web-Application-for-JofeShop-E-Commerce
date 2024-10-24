<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AdminHalamanAboutController extends Controller
{
    public function halaman_about()
    {
        $about = About::first();
    
        if (!$about) {
            $about = new About(); // Membuat objek baru jika tidak ada data About yang tersedia
        }
    
        return view('admin.halaman_about', compact('about'));
    }
    

    public function update_about(Request $request)
    {
        $about = About::first();

        if (!$about) {
            $about = new About(); // Membuat objek baru jika tidak ada data About yang tersedia
        }

        $about->content = $request->input('content');

        if ($request->hasFile('image')) {
            // Mengupload gambar baru jika ada yang diunggah
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/teks_about'), $filename);
            $about->image = $filename;
        }

        $about->save(); // Menyimpan perubahan

        return redirect()->back()->with('success', 'Tentang halaman telah diperbarui');
    }

    public function delete_about()
    {
        $about = About::first(); // Mengambil data About pertama

        if (!empty($about->image)) {
            // Menghapus gambar jika ada
            $imagePath = public_path('image/teks_about/' . $about->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $about->delete(); // Menghapus data About

        return redirect()->back()->with('success', 'Tentang halaman telah dihapus');
    }
}
