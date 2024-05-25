<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArtikelController extends Controller
{
    public function index()
    {
        return view('admin_artikel.index');
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
        Blog::insert($data);

        return redirect()->back();
    }
}
