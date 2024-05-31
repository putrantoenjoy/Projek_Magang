<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index()
    {
        $allData = Blog::get();
        $kategori = Kategori::get();
        return view('admin_artikel.index', compact('allData', 'kategori'));
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
            // 'tags' => $request->tags,
            // 'facebook' => $request->facebook,
            // 'instagram' => $request->instagram,
            // 'youtube' => $request->youtube,
        ];
        $data = new Blog();
        $data->user_id = Auth::user()->id;
        $data->kategori_id = $request->kategori;
        $data->penulis = Auth::user()->name;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->konten = $request->konten;
        // $data->tags = $request->tags;
        // $data->facebook = $request->facebook;
        // $data->instagram = $request->instagram;
        // $data->youtube = $request->youtube;
        
        // dd($data);
        // Blog::insert($data);

        $gambar = $request->file('file');
        if (!empty($gambar)) {
            $file_name = $gambar->hashName();
            $gambar->storeAs('img/artikel', $file_name, 'public');
            $data['gambar'] = $file_name;
        }

        $data->save();

        return redirect()->back()->with('success', 'Artikel berhasil dibuat!');
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

        return redirect()->back()->with('success', 'Artikel berhasil diperbarui!');
    }
    public function delete($id)
    {
      $blog = Blog::findOrFail($id);
        if ($blog->gambar) {
            Storage::disk('public')->delete('img/artikel/' . $blog->gambar);
        }
        $blog->delete();
        return redirect()->back()->with('delete', 'Artikel berhasil dihapus!');
    }
}