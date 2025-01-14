<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    function __construct(){
        $this->middleware(['permission:galeri-index|galeri-update|galeri-create|galeri-delete']);
    }
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
            'deskripsi' => $request->deskripsi,
            'created_by' => auth()->user()->id
        ];

        // Ambil file gambar dari request
        $gambar = $request->file('file');

        if ($gambar) {
            // Nama file yang akan disimpan
            $file_name = $gambar->getClientOriginalName();  // Atau bisa gunakan hashName() jika ingin nama unik

            // Tentukan folder tujuan di public/storage
            $destinationPath = public_path('storage/img/galeri');

            // Pindahkan file ke folder yang diinginkan
            $gambar->move($destinationPath, $file_name);

            // Menyimpan nama file di database
            $data['gambar'] = $file_name;
        }

        // Simpan data ke database
        Galeri::create($data);


        return back()->with('status', 'Galeri berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        // Ambil data yang ingin diupdate
        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'updated_by' => auth()->user()->id
        ];

        // Ambil file gambar yang baru (jika ada)
        $gambar = $request->file('file');
        if ($gambar) {
            // Hapus gambar lama (jika ada)
            $news = Galeri::findOrFail($id);
            if ($news->gambar) {
                $old_image_path = public_path('storage/img/galeri/' . $news->gambar);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Hapus file lama
                }
            }

            // Simpan gambar baru dengan nama unik
            $file_name = $gambar->hashName(); // Nama file yang unik
            $destinationPath = public_path('storage/img/galeri'); // Tentukan folder tujuan

            // Pindahkan file gambar baru ke folder yang benar
            $gambar->move($destinationPath, $file_name);

            // Simpan nama file gambar baru ke dalam data yang akan diupdate
            $data['gambar'] = $file_name;
        }

        // Update data di database
        Galeri::where('id', $id)->update($data);

        // Kembalikan pesan status setelah update
        return back()->with('status', 'Galeri berhasil diperbarui!');
    }


    public function hapus($id)
    {
        // Cari entri galeri yang akan dihapus
        $news = Galeri::findOrFail($id);

        // Cek apakah gambar ada, kemudian hapus file gambar terkait
        if ($news->gambar) {
            $image_path = public_path('storage/img/galeri/' . $news->gambar);
            if (file_exists($image_path)) {
                unlink($image_path); // Hapus file gambar
            }
        }

        // Hapus data galeri dari database
        $news->delete();

        // Kembalikan pesan setelah data dihapus
        return back()->with('delete', 'Galeri berhasil dihapus!');
    }

}