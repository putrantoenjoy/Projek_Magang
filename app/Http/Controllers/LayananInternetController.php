<?php

namespace App\Http\Controllers;

use App\Models\Layanan_internet;
use Auth;
use Illuminate\Http\Request;

class LayananInternetController extends Controller
{
    //
    // function __construct(){
    //     $this->middleware(['permission:event-index|event-update|event-create|event-delete']);
    // }
    public function index(Request $request)
    {
        // $data_pelanggan = Data::get();
        $data_layanan = Layanan_internet::get();

        // $statuses = EventStatus::get();
        // $query = Event::where('soft_delete', 0);

        // if ($request->has('cari') && !empty($request->cari)) {
        //     $cari = $request->cari;
        //     $query->where('tempat', 'like', "%". $cari ."%");
        // } else {
        //     $cari = ''; 
        // }
    
        // $set = [
        //     'data' => $query->paginate(10),
        //     'cari' => $cari, 
        //     'statuses' => $statuses, 
        // ];
    
        return view('admin_layanan.index', compact('data_layanan'));
    }

    public function simpan(Request $request)
    {
        $data = new Layanan_internet();
        $data->nama_paket = $request->nama_paket;
        $data->kategori = $request->kategori;
        $data->harga = $request->harga;
        $data->kecepatan = $request->kecepatan;
        $data->deskripsi = $request->deskripsi;
        $data->benefit_id = 1;
        $data->created_by = Auth::user()->id;
        $data->save();

        return back()->with('status', 'Layanan internet berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama_paket' => $request->nama_paket,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'kecepatan' => $request->kecepatan,
            'deskripsi' => $request->deskripsi,
            'benefit_id' => 1,
            'updated_by' => auth()->user()->id
        ];

        Layanan_internet::find($id)->update($data);

        return back()->with('status', 'Layanan internet berhasil diperbarui!');
    }

    // public function hapus($id)
    // {
    //     $data = [
    //         'soft_delete' => 1,
    //         'deleted_at' => date('Y-m-d H:i:s'),
    //         'deleted_by' => auth()->user()->id
    //     ];

    //     Event::where('id', $id)->update($data);

    //     return back()->with('delete', 'Event berhasil dihapus!');
    // }
}
