<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Models\Event;

class UserEventController extends Controller
{
    public function index()
    {
        $footer = Footer::find(1);
        $event = Event::with('eventstatus')->where('soft_delete', 0)->get();
        $events = Event::with('eventstatus')->where('soft_delete', 0)->paginate(20);
        return view('event.index', compact('event', 'events', 'footer'));
    }
}
