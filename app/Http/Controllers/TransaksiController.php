<?php

namespace App\Http\Controllers;

use App\Models\Layanan_internet;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index(){
        return view('transaksi.index');
    }
    public function checkout(Request $request, $id)
    {
        

        // Redirect ke halaman checkout setelah berhasil
        return view('transaksi.checkout', compact('id'));
    }
    public function pembayaran(Request $request, $id)
    {
        $data = Layanan_internet::find($id);
        // Redirect ke halaman checkout setelah berhasil
        return view('transaksi.pembayaran', compact('data'));
    }

    public function bayar(Request $request, $id){
        // Validasi input
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal_transaksi' => 'required|date',
            'total_bayar' => 'required|numeric',
            'status' => 'required|in:berhasil,pending,gagal',
            'metode_pembayaran' => 'required|string',
            'tanggal_pembayaran' => 'required|date',
            'status_pembayaran' => 'required|in:berhasil,pending,gagal',
        ]);

        // Simpan transaksi
        $transaction = Transaksi::create([
            'user_id' => $validatedData['user_id'],
            'package_id' => $id,
            'tanggal_transaksi' => $validatedData['tanggal_transaksi'],
            'total_bayar' => $validatedData['total_bayar'],
            'status' => $validatedData['status'],
        ]);

        // Simpan pembayaran terkait transaksi tersebut
        $payment = $transaction->payment()->create([
            'metode_pembayaran' => $validatedData['metode_pembayaran'],
            'tanggal_pembayaran' => $validatedData['tanggal_pembayaran'],
            'status_pembayaran' => $validatedData['status_pembayaran'],
        ]);
        return back();
    }
    public function pengaturan($id)
    {
        
        return view('user_setting.index_checkout', compact('id'));
    }
    public function datadiri(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:15',
            'lokasi_pemasangan' => 'nullable|string|max:255',
        ]);

        // Mendapatkan pengguna yang sedang login
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'no_telepon' => $request->no_telepon,
            'lokasi_pemasangan' => $request->lokasi_pemasangan,
        ]);

        return redirect()->route('checkout.index', ['id' => $id])->with('status', 'Data berhasil diperbarui!');
    }
}
