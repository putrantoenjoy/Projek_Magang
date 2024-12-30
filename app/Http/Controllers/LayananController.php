<?php

namespace App\Http\Controllers;

use App\Models\Layanan_internet;
use Illuminate\Http\Request;
use App\Models\Footer;

class LayananController extends Controller
{
    public function index()
    {
        $footer = Footer::find(1);
        $data_layanan = Layanan_internet::get();
        return view('layanan.index', compact('footer', 'data_layanan'));
    }
}
