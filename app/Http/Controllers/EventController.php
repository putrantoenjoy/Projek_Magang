<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        $set = [
            'data' => Event::where('soft_delete', 0)->paginate(10),
        ];
        return view('admin_event.index', $set, compact('event'));
    }

    public function simpan(Request $request)
    {
        $data = [
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'created_by' => auth()->user()->id
        ];

        Event::create($data);

        return back();
    }

    public function update(Request $request, $id)
    {
        $data = [
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'created_by' => auth()->user()->id
        ];

        Event::where('id', $id)->update($data);

        return back();
    }

    public function hapus($id)
    {
        $data = [
            'soft_delete' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => auth()->user()->id
        ];

        Event::where('id', $id)->update($data);

        return back();
    }
}
