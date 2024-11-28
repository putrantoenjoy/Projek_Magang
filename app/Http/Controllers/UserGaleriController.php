<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Models\Galeri;

class UserGaleriController extends Controller
{
    public function index()
    {
        $footer = Footer::find(1);
        $galeri = Galeri::all();
        $galeris = Galeri::paginate(9);
        // dd($galeri); 
        return view('galeri.index', compact('galeri', 'galeris', 'footer'));
    }
}
