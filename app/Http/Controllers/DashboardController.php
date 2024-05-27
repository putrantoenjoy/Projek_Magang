<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $alldata = User::count();
        return view('dashboard', compact('alldata'));
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
