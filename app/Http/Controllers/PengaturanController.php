<?php

namespace App\Http\Controllers;
use App\Models\Footer;

use App\Models\User;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    //
    public function index(){
        $footer = Footer::find(1);
        if (auth()->user()->hasRole('user')) {

            return view('user_setting.index');
        }
        
        return view('admin_setting.footer.index', compact('footer'));
    }
    
    public function update(Request $request, $id){
        $id = 1;
        $data = [
            'nama_website' => $request->nama_website,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'youtube_link' => $request->youtube_link,
            'whatsapp_link' => $request->whatsapp_link,
        ];

        

        Footer::find(1)->update($data);

        return back()->with('status', 'Footer berhasil diperbarui!');
    }
    public function datadiri(Request $request)
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

        return redirect()->back()->with('status', 'Data berhasil diperbarui!');
    }

}
