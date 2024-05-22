<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserGaleriController extends Controller
{
    public function index()
    {
        return view('galeri.index');
    }
}
