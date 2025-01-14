<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    function __construct(){
        $this->middleware(['permission:galeri-index|galeri-update|galeri-create|galeri-delete']);
    }
    public function index(Request $request)
    {   
        $query = Galeri::where('soft_delete', 0);

        if ($request->has('cari') && !empty($request->cari)) {
            $cari = $request->cari;
            $query->where(function($q) use ($cari) {
                $q->where('judul', 'like', "%". $cari ."%")
                  ->orWhere('kategori', 'like', "%". $cari ."%");
            });
        } else {
            $cari = ''; 
        }
    
        $set = [
            'data' => $query->paginate(10),
            'cari' => $cari, 
        ];
    
        return view('admin_galeri.index', $set);
    }

    public function simpan(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Persiapan data untuk disimpan
        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'created_by' => auth()->user()->id,
        ];

        // Proses upload gambar jika ada
        if ($request->hasFile('file')) {
            $gambar = $request->file('file');
            $file_name = $gambar->hashName(); // Mendapatkan nama file unik
            $gambar->storeAs('img/galeri', $file_name, 'public'); // Simpan gambar di storage
            $data['gambar'] = $file_name; // Tambahkan nama file ke data
        }

        // Simpan data ke database
        Galeri::create($data);

        // Redirect kembali dengan pesan sukses
        return back()->with('status', 'Galeri berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'updated_by' => auth()->user()->id
        ];

        $gambar = $request->file('file');
        if (!empty($gambar)) {
            $file_name = $gambar->hashName();
            $gambar->storeAs('img/galeri', $file_name, 'public');
            $data['gambar'] = $file_name;
        }

        Galeri::where('id', $id)->update($data);

        return back()->with('status', 'Galeri berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $news = Galeri::findOrFail($id);
        $image_path = public_path('storage/img/galeri/' . $news->gambar);
        unlink($image_path);
        $news->forcedelete();

        return back()->with('delete', 'Galeri berhasil dihapus!');
    }
}