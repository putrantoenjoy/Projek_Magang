<?php

namespace App\Http\Controllers;

use App\Models\EventStatus;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $statuses = EventStatus::get();
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
            'statuses' => $statuses, 
        ];
    
        return view('admin_event.index', $set);
    }

    public function simpan(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_akhir' => $request->waktu_akhir,
            'status_id' => $request->status,
            'created_by' => auth()->user()->id
        ];

        Event::create($data);

        return back()->with('status', 'Event berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_akhir' => $request->waktu_akhir,
            'status_id' => $request->status,
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
}