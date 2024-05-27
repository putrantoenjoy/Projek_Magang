<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
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
        $galeri = Galeri::count();

        return view('dashboard', compact('alldata','galeri'));
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
