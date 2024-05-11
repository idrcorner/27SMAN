<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;

class AlbumController extends Controller
{
    public function index(){
       $albums=Album::orderby('tgl','desc')->get();
        return view('admin.album.index')
           ->with('albums',$albums)
           ->with('menu','album')->with('menuparent','galeri');
     }
  
     public function create(){
      return view('admin.album.create')->with('menu','album')->with('menuparent','galeri');
     }
  
     public function store(Request $request){
        $request->validate([
           'judul'=>'required',
           
           'tgl'=>'required',
        ]);
       
       
        $slug= createSlug($request->judul,Album::class);
  
        $store =Album::create([
           'judul'=>$request->judul, 
           'slug'=>$slug,
           'deskripsi'=>$request->deskripsi,
           'tgl'=>$request->tgl,   
           'view'=>0,   
        ]);
  
        if(!$store){
           echo "Terjadi kesalahan! Silahkan periksa koneksi internet, dan coba kembali."; die();
        }
  
        session()->flash('success','Album berhasil di tambah.');
  
        return redirect(route('album.show',$store->id));
  
     }
  
     public function show($id){
       $album=Album::find($id);
        if(!$album) return redirect(route('album.index'));

        $fotos=Foto::where('album_id',$album->id)->get();
  
        return view('admin.album.show')
           ->with('album',$album)
           ->with('fotos',$fotos)
           ->with('menu','album')->with('menuparent','galeri');
     }
  
     
     public function edit($id){
       $album=Album::find($id);
        if(!$album) return redirect(route('album.index'));
  
        return view('admin.album.edit')
           ->with('album',$album)
           ->with('menu','album')->with('menuparent','galeri');
     }
  
     public function update(Request $request,$id){
  
       $album=Album::find($id);
        if(!$album) return redirect(route('album.index'));
  
        $request->validate([
           'judul'=>'required', 
           'deskripsi'=>'required',       
        ]);
  
        $data=$request->only(['judul','deskripsi']);
       
        $slug= createSlug($request->judul,Album::class);
        $data['slug']=$slug;
  
   
       $album->update($data);
        
        session()->flash('success','Album berhasil diubah. ');
        return redirect(route('album.index'));
     }
  
     public function delete(Request $request){
       
       $album=Album::find($request->id);
  
        if(!$album) {
           session()->flash('error','Data tidak ditemukan.');
        }else{
           session()->flash('success','Album '.$album->judul.' berhasil dihapus. ');
          
          $album->delete();
        }
  
        return redirect(route('album.index'));
     }

     public function uploadfoto(Request $request){
 
      $request->validate([
         
         'images'=>'required|max:2048',
        
      ]);
      
      $album=Album::find($request->album_id);
      if(!$album) return redirect(route('album.index'));

      $images = $request->file('images');

      foreach ($images as $image) {
         $foto = storeImgSize($image,'foto',800,500);
          Foto::create([
            'foto' => $foto,
            'album_id'=>$request->album_id
         ]);
      }

      session()->flash('success','Foto berhasil ditambah. ');

      return redirect(route('album.show',$album->id));
     }

     public function deletefoto(Request $request){
 
      $foto=Foto::find($request->id);
      if(!$foto)  return redirect(route('album.show',$request->album->id));

      deleteFile($foto->foto);
      $foto->delete();

      session()->flash('success','Foto berhasil dihapus. ');
      return redirect(route('album.show',$request->album_id));
     }
  }
  