<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index(){
        $gurus=Guru::orderby('nama')->get();
        return view('admin.guru.index')
           ->with('gurus',$gurus)
           ->with('menu','guru');
     }
  
     public function create(){
      return view('admin.guru.create')->with('menu','guru');
     }
  
     public function store(Request $request){
        $request->validate([
           'nama'=>'required',
           'jabatan'=>'required',
           'foto'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           'tgl_lahir'=>'required',
           'tmpt_lahir'=>'required',
        ]);
       
        $foto = storeImgSize($request->file('foto'),'guru',600,800);
        $slug= createSlug($request->nama,Guru::class); 
  
        $store =Guru::create([
           'nama'=>$request->nama,
           'jk'=>$request->jk,
           'slug'=>$slug,
           'jabatan'=>$request->jabatan,
           'tmpt_lahir'=>$request->tmpt_lahir,
           'foto'=>$foto,
           'tgl_lahir'=>$request->tgl_lahir,
           'view'=>0,
        ]);
  
        if(!$store){
           echo "Terjadi kesalahan! Silahkan periksa koneksi internet, dan coba kembali."; die();
        }
  
        session()->flash('success','Guru / TU berhasil di tambah.');
  
        return redirect(route('guru.index'));
  
     }
  
     public function show($id){
        $guru=Guru::find($id);
        if(!$guru) return redirect(route('guru.index'));
  
        return view('admin.guru.show')
           ->with('guru',$guru)
           ->with('menu','guru');
     }
  
     
     public function edit($id){
        $guru=Guru::find($id);
        if(!$guru) return redirect(route('guru.index'));
  
        return view('admin.guru.edit')
           ->with('guru',$guru)
           ->with('menu','guru');
     }
  
     public function update(Request $request,$id){
  
        $guru=Guru::find($id);
        if(!$guru) return redirect(route('guru.index'));
  
        $request->validate([
            'nama'=>'required',
            'jabatan'=>'required',  
            'tmpt_lahir'=>'required',
        ]);
  
        $data=$request->only(['nama','jk','jabatan','tgl_lahir','tmpt_lahir']);
       
        $slug= createSlug($request->nama,Guru::class);
        $data['slug']=$slug;
  
        if($request->foto){
           $foto = storeImgSize($request->file('foto'),'guru',600,800);
           if($foto){
              deleteFile($guru->foto);
              $data['foto']=$foto;
           }
        }
  
        $guru->update($data);
        
        session()->flash('success','Data guru berhasil diubah. ');
        return redirect(route('guru.index'));
     }
  
     public function delete(Request $request){
       
        $guru=Guru::find($request->id);
  
        if(!$guru) {
           session()->flash('error','Data tidak ditemukan.');
        }else{
           session()->flash('success','Guru/TU '.$guru->judul.' berhasil dihapus. ');
           deleteFile($guru->foto);
           $guru->delete();
        }
  
        return redirect(route('guru.index'));
     }
  }
  