<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index(){
        $kontak=Kontak::find(1);
        return view('admin.kontak.edit')
           ->with('kontak',$kontak)
           ->with('menu','kontak');
     }

     public function update(Request $request,$id){
  
        $quote=Kontak::find($id);
        if(!$quote) return redirect(route('kontak.index'));
  
    
        $data=$request->only(['alamat','tlp','email','fb','ig','yt','tw']);
        
        $quote->update($data);
        
        session()->flash('success','Kontak berhasil diubah. ');
        return redirect(route('kontak.index'));
     }
}
