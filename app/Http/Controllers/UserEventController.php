<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class UserEventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return view('event.index', compact('event'));
    }
}
