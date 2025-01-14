<?php

namespace App\Http\Controllers;

use App\Models\Layanan_internet;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index(){
        // $data_pembayaran = Pembayaran::get();
        // dd($data_pembayaran);
        if (auth()->user()->hasRole('user')) {
            $data_pembayaran = Pembayaran::whereHas('transaksi', function($query) {
                $query->where('user_id', auth()->user()->id);
            })->get();
            return view('transaksi.index', compact('data_pembayaran'));
        }
        
        $data_pembayaran = Pembayaran::get();
        return view('admin_layanan.transaksi.index', compact('data_pembayaran'));
            
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
        
        $transaction = Transaksi::create([
            'user_id' => auth()->id(),
            'layanan_id' => $id,      
            'tanggal_aktif' => now(), 
            'total_bayar' => Layanan_internet::find($id)->harga, 
            'status' => 'pending',
        ]);
        Pembayaran::create([
            'transaksi_id' => $transaction->transaksi_id,
            'metode_pembayaran' => 'BCA',
            'tanggal_pembayaran' => now(),
            'total_bayar' => Layanan_internet::find($id)->harga,
            'status_pembayaran' => 'pending',
        ]);
        return redirect()->route('transaksi.index')->with('status', 'Pemesanan layanan internet berhasil!');
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
