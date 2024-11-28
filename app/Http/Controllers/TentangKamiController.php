<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $footer = Footer::find(1);
        return view('tentang_kami.index', compact('footer'));
    }
}