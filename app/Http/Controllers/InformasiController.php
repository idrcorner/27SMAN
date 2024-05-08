<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
   public function index(){
      $informasis=Informasi::orderby('tgl_publis','desc')->get();
      return view('admin.informasi.index')
         ->with('informasis',$informasis)
         ->with('menu','informasi');
   }

   public function create(){
    return view('admin.informasi.create')->with('menu','informasi');
   }

   public function store(Request $request){
      $request->validate([
         'judul'=>'required',
         'konten'=>'required',
         'cover'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
         'tgl_publis'=>'required',
         'status'=>'required',
      ]);
     
      $cover = storeFile($request->file('cover'),'informasi');
      $slug= createSlug($request->judul,Informasi::class);

      $store =Informasi::create([
         'judul'=>$request->judul,
         'subjudul'=>$request->subjudul,
         'slug'=>$slug,
         'konten'=>$request->konten,
         'cover'=>$cover,
         'tgl_publis'=>$request->tgl_publis,
         'view'=>0,
         'user_id'=>auth()->user()->id,
         'status'=>$request->status
      ]);

      if(!$store){
         echo "Terjadi kesalahan! Silahkan periksa koneksi internet, dan coba kembali."; die();
      }

      session()->flash('success','Informasi berhasil di tambah.');

      return redirect(route('informasi.index'));

   }

   public function show($id){
      $informasi=Informasi::find($id);
      if(!$informasi) return redirect(route('informasi.index'));

      return view('admin.informasi.show')
         ->with('informasi',$informasi)
         ->with('menu','informasi');
   }

   
   public function edit($id){
      $informasi=Informasi::find($id);
      if(!$informasi) return redirect(route('informasi.index'));

      return view('admin.informasi.edit')
         ->with('informasi',$informasi)
         ->with('menu','informasi');
   }

   public function update(Request $request,$id){

      $informasi=Informasi::find($id);
      if(!$informasi) return redirect(route('informasi.index'));

      $request->validate([
         'judul'=>'required', 
         'konten'=>'required',       
      ]);

      $data=$request->only(['judul','subjudul','konten','tgl_publis','status']);
     
      $slug= createSlug($request->judul,Informasi::class);
      $data['slug']=$slug;

      if($request->cover){
         $cover = storeFile($request->file('cover'),'informasi');
         if($cover){
            deleteFile($informasi->cover);
            $data['cover']=$cover;
         }
      }

      $informasi->update($data);
      
      session()->flash('success','Informasi berhasil diubah. ');
      return redirect(route('informasi.index'));
   }

   public function delete(Request $request){
     
      $informasi=Informasi::find($request->id);

      if(!$informasi) {
         session()->flash('error','Data tidak ditemukan.');
      }else{
         session()->flash('success','Informasi '.$informasi->judul.' berhasil dihapus. ');
         deleteFile($informasi->cover);
         $informasi->delete();
      }

      return redirect(route('informasi.index'));
   }
}
