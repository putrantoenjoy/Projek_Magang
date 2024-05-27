<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class UserGaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();
        // dd($galeri); 
        return view('galeri.index', compact('galeri'));
    }
}
