<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        return view('dashboard');
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
