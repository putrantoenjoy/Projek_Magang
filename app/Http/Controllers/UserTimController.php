<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimKerja;

class UserTimController extends Controller
{
    public function index()
    {
        $timkerja = TimKerja::all();
        return view('tim.index', compact('timkerja'));
    }
}