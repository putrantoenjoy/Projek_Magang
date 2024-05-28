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
            'tags' => $request->tags,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ];
        $data = new Blog();
        $data->user_id = Auth::user()->id;
        $data->kategori_id = $request->kategori;
        $data->penulis = Auth::user()->name;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->konten = $request->konten;
        $data->tags = $request->tags;
        // $data->facebook = $request->facebook;
        // $data->instagram = $request->instagram;
        // $data->youtube = $request->youtube;
        $data->save();
        // dd($data);
        // Blog::insert($data);

        return redirect()->back();
    }
}
