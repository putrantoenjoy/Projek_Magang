<?php

namespace App\Http\Controllers;

use App\Models\Layanan_internet;
use Illuminate\Http\Request;
use App\Models\Footer;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', null);

    // Jika tidak ada filter yang dipilih, ambil semua layanan
        if ($filter) {
            // Ambil data layanan berdasarkan kategori yang dipilih
            $data_layanan = Layanan_internet::where('kategori', $filter)->get();
        } else {
            // Ambil semua data layanan jika tidak ada filter
            $data_layanan = Layanan_internet::all();
        }

        // Ambil data footer
        $footer = Footer::find(1);

        // Return view dengan data yang telah difilter atau semua data
        return view('layanan.index', compact('footer', 'data_layanan'));
    }
}
