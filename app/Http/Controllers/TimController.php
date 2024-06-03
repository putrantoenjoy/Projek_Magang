<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimKerja;

class TimController extends Controller
{
    function __construct(){
        $this->middleware(['permission:tim-index|tim-update|tim-create|tim-delete']);
    }
    public function index(Request $request)
    {
        $query = TimKerja::where('soft_delete', 0);

        if ($request->has('cari') && !empty($request->cari)) {
            $cari = $request->cari;
            $query->where(function($q) use ($cari) {
                $q->where('nama', 'like', "%". $cari ."%")
                  ->orWhere('jabatan', 'like', "%". $cari ."%");
            });
        } else {
            $cari = ''; 
        }
    
        $set = [
            'data' => $query->paginate(10),
            'cari' => $cari, 
        ];
        return view('admin_tim.index', $set);
    }

    public function simpan(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'created_by' => auth()->user()->id
        ];

        $foto = $request->file('file');
        if (!empty($foto)) {
            $file_name = $foto->hashName();
            $foto->storeAs('img/tim', $file_name, 'public');
            $data['foto'] = $file_name;
        }

        TimKerja::create($data);

        return back()->with('status', 'Tim Kerja berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'updated_by' => auth()->user()->id
        ];

        $foto = $request->file('file');
        if (!empty($foto)) {
            $file_name = $foto->hashName();
            $foto->storeAs('img/tim', $file_name, 'public');
            $data['foto'] = $file_name;
        }

        TimKerja::where('id', $id)->update($data);

        return back()->with('status', 'Tim Kerja berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $data = [
            'soft_delete' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => auth()->user()->id
        ];

        TimKerja::where('id', $id)->update($data);

        return back()->with('delete', 'Tim Kerja berhasil dihapus!');
    }
}