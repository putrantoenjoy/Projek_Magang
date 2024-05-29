<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Blog;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $alldata = User::count();
        $artikel = Blog::count();
        $galeri = Galeri::count();

        $artikelTerbaru = Blog::latest()->take(3)->get();
        
        return view('dashboard', compact('alldata', 'artikel', 'galeri', 'artikelTerbaru'));
    }

    public function verify()
    {
        return view('verify');
    }

    public function notice()
    {
        return view('verify');
    }
}
