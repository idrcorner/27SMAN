<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $sliders=Slider::orderby('created_at','desc')->get();
        return view('admin.slider.index')
           ->with('sliders',$sliders)
           ->with('menu','slider');
     }
  
     public function create(){
      return view('admin.slider.create')->with('menu','slider');
     }
  
     public function store(Request $request){
        $request->validate([
           'judul'=>'required',
           'deskripsi'=>'required',
           'cover'=>'required|image|mimes:jpeg,png,jpg,gif,PNG|max:2048',
           
        ]);
       
        $cover = storeImgSize($request->file('cover'),'slider',1920,500);
  
  
        $store =Slider::create([
           'judul'=>$request->judul, 
           'deskripsi'=>$request->deskripsi,
           'cover'=>$cover, 
           
        ]);
  
        if(!$store){
           echo "Terjadi kesalahan! Silahkan periksa koneksi internet, dan coba kembali."; die();
        }
  
        session()->flash('success','Slider berhasil di tambah.');
  
        return redirect(route('slider.index'));
  
     }
  
     public function show($id){
        $slider=Slider::find($id);
        if(!$slider) return redirect(route('slider.index'));
  
        return view('admin.slider.show')
           ->with('slider',$slider)
           ->with('menu','slider');
     }
  
     
     public function edit($id){
        $slider=Slider::find($id);
        if(!$slider) return redirect(route('slider.index'));
  
        return view('admin.slider.edit')
           ->with('slider',$slider)
           ->with('menu','slider');
     }
  
     public function update(Request $request,$id){
  
        $slider=Slider::find($id);
        if(!$slider) return redirect(route('slider.index'));
  
        $request->validate([
           'judul'=>'required', 
           'deskripsi'=>'required',       
        ]);
  
        $data=$request->only(['judul','deskripsi' ]);
       
       
  
        if($request->cover){
           $cover =  storeImgSize($request->file('cover'),'slider',1920,500);
           if($cover){
              deleteFile($slider->cover);
              $data['cover']=$cover;
           }
        }
  
        $slider->update($data);
        
        session()->flash('success','Slider berhasil diubah. ');
        return redirect(route('slider.index'));
     }
  
     public function delete(Request $request){
       
        $slider=Slider::find($request->id);
  
        if(!$slider) {
           session()->flash('error','Data tidak ditemukan.');
        }else{
           session()->flash('success','Slider '.$slider->judul.' berhasil dihapus. ');
           deleteFile($slider->cover);
           $slider->delete();
        }
  
        return redirect(route('slider.index'));
     }
  }
  