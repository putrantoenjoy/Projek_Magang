<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Models\TimKerja;

class UserTimController extends Controller
{
    public function index()
    {
        $footer = Footer::find(1);
        $timkerja = TimKerja::all();
        return view('tim.index', compact('timkerja', 'footer'));
    }
}