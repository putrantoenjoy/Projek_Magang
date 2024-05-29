<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class UserEventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        $events = Event::paginate(20);
        return view('event.index', compact('event', 'events'));
    }
}
