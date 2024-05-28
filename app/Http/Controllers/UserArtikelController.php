<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class UserArtikelController extends Controller
{
    public function index()
    {
        $artikels = Blog::all();
        return view('artikel.index', compact('artikels'));
    }
    
    public function show($id)
    {
        $artikel = Blog::findOrFail($id);

        return view('artikel.show', compact('artikel'));
    }
}