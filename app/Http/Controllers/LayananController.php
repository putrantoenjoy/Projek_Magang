<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class LayananController extends Controller
{
    public function index()
    {
        $footer = Footer::find(1);
        return view('layanan.index', compact('footer'));
    }
}
