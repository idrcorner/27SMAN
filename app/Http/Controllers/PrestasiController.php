<?php

namespace App\Http\Controllers;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(){
        $prestasis=Prestasi::orderby('created_at','desc')->get();
        return view('admin.prestasi.index')
           ->with('prestasis',$prestasis)
           ->with('menu','prestasi');
     }
  
     public function create(){
      return view('admin.prestasi.create')->with('menu','prestasi');
     }
  
     public function store(Request $request){
        $request->validate([
           'judul'=>'required',
           'konten'=>'required',
           'cover'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           'status'=>'required',
        ]);
       
        $cover = storeImgSize($request->file('cover'),'prestasi',800,500);
        $slug= createSlug($request->judul,Prestasi::class);
  
        $store =Prestasi::create([
           'judul'=>$request->judul, 
           'slug'=>$slug,
           'konten'=>$request->konten,
           'cover'=>$cover, 
           'view'=>0,
           'user_id'=>auth()->user()->id,
           'status'=>$request->status
        ]);
  
        if(!$store){
           echo "Terjadi kesalahan! Silahkan periksa koneksi internet, dan coba kembali."; die();
        }
  
        session()->flash('success','Prestasi berhasil di tambah.');
  
        return redirect(route('prestasi.index'));
  
     }
  
     public function show($id){
        $prestasi=Prestasi::find($id);
        if(!$prestasi) return redirect(route('prestasi.index'));
  
        return view('admin.prestasi.show')
           ->with('prestasi',$prestasi)
           ->with('menu','prestasi');
     }
  
     
     public function edit($id){
        $prestasi=Prestasi::find($id);
        if(!$prestasi) return redirect(route('prestasi.index'));
  
        return view('admin.prestasi.edit')
           ->with('prestasi',$prestasi)
           ->with('menu','prestasi');
     }
  
     public function update(Request $request,$id){
  
        $prestasi=Prestasi::find($id);
        if(!$prestasi) return redirect(route('prestasi.index'));
  
        $request->validate([
           'judul'=>'required', 
           'konten'=>'required',       
        ]);
  
        $data=$request->only(['judul','konten','status']);
       
        $slug= createSlug($request->judul,Prestasi::class);
        $data['slug']=$slug;
  
        if($request->cover){
           $cover =  storeImgSize($request->file('cover'),'prestasi',800,500);
           if($cover){
              deleteFile($prestasi->cover);
              $data['cover']=$cover;
           }
        }
  
        $prestasi->update($data);
        
        session()->flash('success','Prestasi berhasil diubah. ');
        return redirect(route('prestasi.index'));
     }
  
     public function delete(Request $request){
       
        $prestasi=Prestasi::find($request->id);
  
        if(!$prestasi) {
           session()->flash('error','Data tidak ditemukan.');
        }else{
           session()->flash('success','Prestasi '.$prestasi->judul.' berhasil dihapus. ');
           deleteFile($prestasi->cover);
           $prestasi->delete();
        }
  
        return redirect(route('prestasi.index'));
     }
  }
  