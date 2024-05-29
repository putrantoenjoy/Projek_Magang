<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use PDF;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::where('soft_delete', 0);

        if ($request->has('cari') && !empty($request->cari)) {
            $cari = $request->cari;
            $query->where('tempat', 'like', "%". $cari ."%");
        } else {
            $cari = ''; 
        }
    
        $set = [
            'data' => $query->paginate(10),
            'cari' => $cari, 
        ];
    
        return view('admin_event.index', $set);
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

        return back()->with('status', 'Event berhasil dibuat!');
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

        return back()->with('status', 'Event berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $data = [
            'soft_delete' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => auth()->user()->id
        ];

        Event::where('id', $id)->update($data);

        return back()->with('delete', 'Event berhasil dihapus!');
    }
    public function export()
    {
        $data = Event::where('soft_delete', 0)->get();

        $pdf = PDF::loadView('admin_event.pdf', compact('data'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}