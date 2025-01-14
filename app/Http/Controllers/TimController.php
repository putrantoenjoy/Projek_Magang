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
        // Menyiapkan data untuk disimpan
        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'created_by' => auth()->user()->id
        ];

        // Mengecek apakah ada file gambar yang diupload
        $foto = $request->file('file');
        if ($foto) {
            // Menyimpan gambar dengan nama unik
            $file_name = $foto->hashName(); // Nama file unik
            $destinationPath = public_path('storage/img/tim'); // Folder tujuan

            // Memindahkan gambar ke folder yang sesuai
            $foto->move($destinationPath, $file_name);

            // Menambahkan nama file gambar ke dalam data
            $data['foto'] = $file_name;
        }

        // Menyimpan data tim kerja ke dalam database
        TimKerja::create($data);

        // Mengembalikan pesan status
        return back()->with('status', 'Tim Kerja berhasil dibuat!');
    }


    public function update(Request $request, $id)
    {
        // Menyiapkan data untuk diupdate
        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'updated_by' => auth()->user()->id
        ];

        // Mengecek apakah ada file gambar yang diupload
        $foto = $request->file('file');
        if ($foto) {
            // Mengambil data tim kerja berdasarkan ID
            $timKerja = TimKerja::findOrFail($id);

            // Menghapus gambar lama (jika ada)
            if ($timKerja->foto) {
                $old_image_path = public_path('storage/img/tim/' . $timKerja->foto);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Menghapus file lama
                }
            }

            // Menyimpan gambar baru dengan nama unik
            $file_name = $foto->hashName();
            $destinationPath = public_path('storage/img/tim'); // Folder tujuan

            // Memindahkan file gambar baru
            $foto->move($destinationPath, $file_name);

            // Menambahkan nama file gambar ke dalam data
            $data['foto'] = $file_name;
        }

        // Mengupdate data tim kerja di database
        TimKerja::where('id', $id)->update($data);

        // Mengembalikan pesan status setelah update
        return back()->with('status', 'Tim Kerja berhasil diperbarui!');
    }


    public function hapus($id)
    {
        // Cari data TimKerja berdasarkan ID
        $timKerja = TimKerja::findOrFail($id);

        // Periksa apakah ada gambar yang terkait
        if ($timKerja->foto) {
            // Tentukan path file gambar yang akan dihapus
            $image_path = public_path('storage/img/tim/' . $timKerja->foto);

            // Periksa apakah gambar ada, jika ada, hapus file gambar tersebut
            if (file_exists($image_path)) {
                unlink($image_path); // Hapus file gambar
            }
        }

        // Update data dengan soft delete
        $data = [
            'soft_delete' => 1,
            'deleted_at' => now(), // Gunakan helper `now()` untuk mendapatkan waktu sekarang
            'deleted_by' => auth()->user()->id
        ];

        // Lakukan pembaruan data dengan soft delete
        $timKerja->update($data);

        // Kembalikan pesan setelah data berhasil dihapus
        return back()->with('delete', 'Tim Kerja berhasil dihapus!');
    }

}