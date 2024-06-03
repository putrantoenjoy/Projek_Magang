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
        $data = [
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->kategori,
            'penulis' => Auth::user()->name,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'konten' => $request->konten,
        ];
        $data = new Blog();
        $data->user_id = Auth::user()->id;
        $data->kategori_id = $request->kategori;
        $data->penulis = Auth::user()->name;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->konten = $request->konten;

        $gambar = $request->file('file');
        if (!empty($gambar)) {
            $file_name = $gambar->hashName();
            $gambar->storeAs('img/artikel', $file_name, 'public');
            $data['gambar'] = $file_name;
        }

        $data->save();

        return redirect()->back()->with('status', 'Artikel berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->kategori,
            'penulis' => Auth::user()->name,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'konten' => $request->konten,
        ];

        $data = new Blog();
        $data->user_id = Auth::user()->id;
        $data->kategori_id = $request->kategori;
        $data->penulis = Auth::user()->name;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->konten = $request->konten;

        $gambar = $request->file('file');
        if (!empty($gambar)) {
            $file_name = $gambar->hashName();
            $gambar->storeAs('img/artikel', $file_name, 'public');
            $data['gambar'] = $file_name;
        }

        $data->save();

        return redirect()->back()->with('status', 'Artikel berhasil diperbarui!');
    }
    public function delete($id)
    {
        Blog::find($id)->delete();
        return redirect()->back()->with('delete', 'Artikel berhasil dihapus!');
    }
    public function uploadImg(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $image = $request->file('file');
        // $imageName = time().'.'.$image->extension();
        // $image->storeAs('img/froala', $imageName);

        // return redirect()->back();

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan file gambar yang diunggah
        $gambar = $request->file('file');
        if ($gambar) {
            $file_name = $gambar->hashName();
            $gambar->storeAs('public/img/galeri', $file_name); // Simpan di direktori public/img/galeri
            $url = Storage::url('img/galeri/' . $file_name); // Dapatkan URL publik

            // Mengembalikan URL gambar dalam respons JSON
            return response()->json(['link' => $url]);
        }

        return response()->json(['error' => 'Gagal mengunggah gambar'], 500);
    }
}