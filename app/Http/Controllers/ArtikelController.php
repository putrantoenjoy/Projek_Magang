<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    function __construct(){
        $this->middleware(['permission:artikel-index|artikel-update|artikel-create|artikel-delete']);
    }
    public function index(Request $request)
    {
        $cari = $request->get('cari');  

        if ($cari) {
            $allData = Blog::where('judul', 'like', "%$cari%")
                            ->orWhereHas('kategori', function($query) use ($cari) {
                                $query->where('nama', 'like', "%$cari%");
                            })
                            ->get();
        } else {
            $allData = Blog::get();
        }

        $kategori = Kategori::get();
        return view('admin_artikel.index', compact('allData', 'kategori', 'cari'));
    }

    public function create(Request $request)
    {
        // Menyiapkan data untuk artikel baru
        $data = new Blog();
        $data->user_id = Auth::user()->id;
        $data->kategori_id = $request->kategori;
        $data->penulis = Auth::user()->name;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->konten = $request->konten;

        // Mengecek apakah ada gambar yang di-upload
        $gambar = $request->file('file');
        if ($gambar) {
            // Membuat nama file unik untuk gambar
            $file_name = $gambar->hashName();
            $destinationPath = public_path('storage/img/artikel'); // Menentukan folder tujuan

            // Memindahkan gambar ke folder yang sesuai
            $gambar->move($destinationPath, $file_name);

            // Menyimpan nama gambar ke dalam data artikel
            $data->gambar = $file_name;
        }

        // Menyimpan artikel ke dalam database
        $data->save();

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->back()->with('status', 'Artikel berhasil dibuat!');
    }


    public function update(Request $request, $id)
    {
        // Mencari data artikel yang akan diperbarui
        $data = Blog::findOrFail($id);
        $data->user_id = Auth::user()->id;
        $data->kategori_id = $request->kategori;
        $data->penulis = Auth::user()->name;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->konten = $request->editkonten;

        // Mengecek apakah ada gambar baru yang di-upload
        $gambar = $request->file('file');
        if ($gambar) {
            // Menghapus gambar lama jika ada
            if ($data->gambar) {
                $old_image_path = public_path('storage/img/artikel/' . $data->gambar);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Menghapus gambar lama
                }
            }

            // Membuat nama file unik untuk gambar baru
            $file_name = $gambar->hashName();
            $destinationPath = public_path('storage/img/artikel'); // Menentukan folder tujuan

            // Memindahkan gambar baru ke folder yang sesuai
            $gambar->move($destinationPath, $file_name);

            // Menyimpan nama gambar baru
            $data->gambar = $file_name;
        }

        // Menyimpan perubahan data artikel
        $data->save();

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->back()->with('status', 'Artikel berhasil diperbarui!');
    }

    public function delete($id)
    {
        // Mencari data artikel yang akan dihapus
        $blog = Blog::findOrFail($id);

        // Menghapus gambar terkait jika ada
        if ($blog->gambar) {
            $image_path = public_path('storage/img/artikel/' . $blog->gambar);
            if (file_exists($image_path)) {
                unlink($image_path); // Menghapus gambar
            }
        }

        // Menghapus artikel dari database
        $blog->delete();

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->back()->with('delete', 'Artikel berhasil dihapus!');
    }

    public function uploadImg(Request $request)
    {
        // Validasi file gambar yang diunggah
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengambil file gambar yang diunggah
        $gambar = $request->file('file');
        if ($gambar) {
            // Membuat nama file unik untuk gambar
            $file_name = $gambar->hashName(); // Nama file yang unik
            $destinationPath = public_path('storage/img/galeri'); // Menentukan folder tujuan

            // Memindahkan file gambar ke folder yang sesuai
            $gambar->move($destinationPath, $file_name);

            // Mendapatkan URL gambar yang dapat diakses publik
            $url = Storage::url('img/galeri/' . $file_name); // Menghasilkan URL gambar

            // Mengembalikan URL gambar dalam respons JSON
            return response()->json(['link' => $url]);
        }

        // Mengembalikan error jika gagal mengunggah gambar
        return response()->json(['error' => 'Gagal mengunggah gambar'], 500);
    }

}