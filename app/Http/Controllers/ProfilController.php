<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfilController extends Controller
{
    public function index(){
        $profils=Profile::orderby('judul')->get();
        return view('admin.profil.index')
           ->with('profils',$profils)
           ->with('menu','profil');
     }
  
     public function create(){
      return view('admin.profil.create')->with('menu','profil');
     }
  
     public function store(Request $request){
      
        $request->validate([
           'judul'=>'required',
           'konten'=>'required',
           'status'=>'required',
        ]);
       
        $slug= createSlug($request->judul,Profile::class);
  
        $store =Profile::create([
           'judul'=>$request->judul,
           'slug'=>$slug,
           'konten'=>$request->konten,
           'view'=>0,
           'user_id'=>auth()->user()->id,
           'status'=>$request->status
        ]);
  
        if(!$store){
           echo "Terjadi kesalahan! Silahkan periksa koneksi internet, dan coba kembali."; die();
        }
  
        session()->flash('success','Profil berhasil di tambah.');
  
        return redirect(route('profil.index'));
  
     }
  
     public function show($id){
        $profil=Profile::find($id);
        if(!$profil) return redirect(route('profil.index'));
  
        return view('admin.profil.show')
           ->with('profil',$profil)
           ->with('menu','profil');
     }
  
     
     public function edit($id){
        $profil=Profile::find($id);
        if(!$profil) return redirect(route('profil.index'));
  
        return view('admin.profil.edit')
           ->with('profil',$profil)
           ->with('menu','profil');
     }
  
     public function update(Request $request,$id){
  
        $profil=Profile::find($id);
        if(!$profil) return redirect(route('profil.index'));
  
        $request->validate([
           'judul'=>'required', 
           'konten'=>'required',       
        ]);
  
        $data=$request->only(['judul','subjudul','konten','tgl_publis','status']);
       
        $slug= createSlug($request->judul,Profile::class);
        $data['slug']=$slug;
  
        $profil->update($data);
        
        session()->flash('success','profil berhasil diubah. ');
        return redirect(route('profil.index'));
     }
  
     public function delete(Request $request){
       
        $profil=Profile::find($request->id);
  
        if(!$profil) {
           session()->flash('error','Data tidak ditemukan.');
        }else{
           session()->flash('success','profil '.$profil->judul.' berhasil dihapus. ');
           $profil->delete();
        }
  
        return redirect(route('profil.index'));
     }
  }
  