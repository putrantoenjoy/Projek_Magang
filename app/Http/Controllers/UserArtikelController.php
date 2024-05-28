<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Kategori;

class UserArtikelController extends Controller
{
    public function index(Request $request)
    {

        $query = Blog::latest();

        if ($request->has('cari') && !empty($request->cari)) {
            $cari = $request->cari;
            $query->where('judul', 'like', "%". $cari ."%");
        } else {
            $cari = ''; 
        }

        $kategori = Kategori::all();

        if (!empty($request->kategori))
        {
            $query->where('kategori_id', $request->kategori);
        } 

       
        $artikels = $query->paginate(4);
        $artikelTerbaru = Blog::latest()->take(3)->get();
        // $kategori = Kategori::all();
        // $tag = Tag::all();

        return view('artikel.index', compact('artikels', 'cari', 'artikelTerbaru', 'kategori'));
    }
    
    public function show($id, Request $request)
    {
        $artikel = Blog::findOrFail($id);

        if ($request->has('cari') && !empty($request->cari)) {
            $cari = $request->cari;
            $query->where('judul', 'like', "%". $cari ."%");
        } else {
            $cari = ''; 
        }

        $kategori = Kategori::all();

        if (!empty($request->kategori))
        {
            $query->where('kategori_id', $request->kategori);
        }
        
        $artikelTerbaru = Blog::latest()->take(3)->get();
        
        return view('artikel.show', compact('artikel', 'cari', 'artikelTerbaru', 'kategori'));
    }
}