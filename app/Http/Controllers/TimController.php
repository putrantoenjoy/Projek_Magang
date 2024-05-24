<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimKerja;

class TimController extends Controller
{
    public function index()
    {
        $timkerja = TimKerja::all();
        $set = [
            'data' => TimKerja::where('soft_delete', 0)->paginate(10),
        ];
        return view('admin_tim.index', $set, compact('timkerja'));
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

        return back();
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

        return back();
    }

    public function hapus($id)
    {
        $data = [
            'soft_delete' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => auth()->user()->id
        ];

        TimKerja::where('id', $id)->update($data);

        return back();
    }
}
