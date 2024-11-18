<?php

namespace App\Http\Controllers;
use App\Models\Footer;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    //
    public function index(){
        $footer = Footer::find(1);
        
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
}
