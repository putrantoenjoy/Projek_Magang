<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use PDF;

class GaleriController extends Controller
{
    public function index(Request $request)
    {   
        $query = Galeri::where('soft_delete', 0);

        if ($request->has('cari') && !empty($request->cari)) {
            $cari = $request->cari;
            $query->where(function($q) use ($cari) {
                $q->where('judul', 'like', "%". $cari ."%")
                  ->orWhere('kategori', 'like', "%". $cari ."%");
            });
        } else {
            $cari = ''; 
        }
    
        $set = [
            'data' => $query->paginate(10),
            'cari' => $cari, 
        ];
    
        return view('admin_galeri.index', $set);
    }

    public function simpan(Request $request)
    {
        $data = [
            // 'post_id' => $request->post_id,
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'created_by' => auth()->user()->id
        ];

        $gambar = $request->file('file');
        if (!empty($gambar)) {
            $file_name = $gambar->hashName();
            $gambar->storeAs('img/galeri', $file_name, 'public');
            $data['gambar'] = $file_name;
        }
        // dd($request->all());
        Galeri::create($data);

        return back()->with('status', 'Galeri berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'updated_by' => auth()->user()->id
        ];

        $gambar = $request->file('file');
        if (!empty($gambar)) {
            $file_name = $gambar->hashName();
            $gambar->storeAs('img/galeri', $file_name, 'public');
            $data['gambar'] = $file_name;
        }

        Galeri::where('id', $id)->update($data);

        return back()->with('status', 'Galeri berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $data = [
            'soft_delete' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => auth()->user()->id
        ];

        Galeri::where('id', $id)->update($data);

        return back()->with('delete', 'Galeri berhasil dihapus!');
    }
    public function export()
    {
        $data = Galeri::where('soft_delete', 0)->get();

        $pdf = PDF::loadView('admin_galeri.pdf', compact('data'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}