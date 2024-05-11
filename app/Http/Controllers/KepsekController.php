<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepsek;

class KepsekController extends Controller
{
       
    public function edit(){
        $kepsek=Kepsek::find(1);
        if(!$kepsek) return redirect(route('kepsek.index'));
  
        return view('admin.kepsek.edit')
           ->with('kepsek',$kepsek)
           ->with('menu','kepsek');
     }

     public function update(Request $request,$id){
  
        $kepsek=Kepsek::find($id);
        if(!$kepsek) return redirect(route('kepsek.edit'));
  
        $request->validate([
           'nama'=>'required', 
           'nip'=>'required',       
           'katasambutan'=>'required',       
           
        ]);
  
        $data=$request->only(['nama','nip','katasambutan']);
        
        if($request->foto){
           $foto =  storeImgSize($request->file('foto'),'kepsek',800,500);
           if($foto){
              deleteFile($kepsek->foto);
              $data['foto']=$foto;
           }
        }
  
        $kepsek->update($data);
        
        session()->flash('success','Kepala sekolah berhasil diubah. ');
        return redirect(route('kepsek.edit'));
     }
}
