<?php

namespace App\Http\Controllers;

use App\Models\Layanan_internet;
use App\Models\Pembayaran;
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
        if (auth()->user()->hasRole('user')) {
            // Jika memiliki role 'user', arahkan ke halaman tertentu
            $data_layanan = Layanan_internet::get();
            return view('user_layanan.index', compact('data_layanan'));
        }
        $data_layanan = Layanan_internet::get();
    
        // Jika pengguna tidak memiliki role 'user', arahkan ke halaman admin
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
        $data->masa_aktif = $request->masa_aktif;
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
            'masa_aktif' => $request->masa_aktif,
            'updated_by' => auth()->user()->id
        ];

        Layanan_internet::find($id)->update($data);

        return back()->with('status', 'Layanan internet berhasil diperbarui!');
    }

    // public function transaksi(){
    //     $data_pembayaran = Pembayaran::get();
    //     return view('admin_layanan.transaksi.index', compact('data_pembayaran'));
    // }
}
