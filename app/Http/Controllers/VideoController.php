<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index(){
        $videos=Video::orderby('tgl','desc')->get();
         return view('admin.video.index')
            ->with('videos',$videos)
            ->with('menu','video')->with('menuparent','galeri');
      }
   
      public function create(){
       return view('admin.video.create')->with('menu','video')->with('menuparent','galeri');
      }
   
      public function store(Request $request){
         $request->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            
            'tgl'=>'required',
         ]);
        
        
         $slug= createSlug($request->judul,Video::class);
   
         $store =Video::create([
            'judul'=>$request->judul, 
            'slug'=>$slug,
            'deskripsi'=>$request->deskripsi,
            'tgl'=>$request->tgl,   
            'view'=>0,   
         ]);
   
         if(!$store){
            echo "Terjadi kesalahan! Silahkan periksa koneksi internet, dan coba kembali."; die();
         }
   
         session()->flash('success','Video berhasil di tambah.');
   
         return redirect(route('video.index'));
   
      }
   
      public function show($id){
       
      }
   
      
      public function edit($id){
        $video=Video::find($id);
         if(!$video) return redirect(route('video.index'));
   
         return view('admin.video.edit')
            ->with('video',$video)
            ->with('menu','video')->with('menuparent','galeri');
      }
   
      public function update(Request $request,$id){
   
        $video=Video::find($id);
         if(!$video) return redirect(route('video.index'));
   
         $request->validate([
            'judul'=>'required', 
            'deskripsi'=>'required',       
         ]);
   
         $data=$request->only(['judul','deskripsi']);
        
         $slug= createSlug($request->judul,Video::class);
         $data['slug']=$slug;
   
    
        $video->update($data);
         
         session()->flash('success','Video berhasil diubah. ');
         return redirect(route('video.index'));
      }
   
      public function delete(Request $request){
        
        $video=Video::find($request->id);
   
         if(!$video) {
            session()->flash('error','Data tidak ditemukan.');
         }else{
            session()->flash('success','Video '.$video->judul.' berhasil dihapus. ');
           
           $video->delete();
         }
   
         return redirect(route('video.index'));
      }
 
   
   }
   