<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
       $blogs=Blog::where('user_id',auth()->user()->id)->orderby('tgl_publis','desc')->get();
        return view('admin.blog.index')
           ->with('blogs',$blogs)
           ->with('menu','blog');
     }
  
     public function create(){
      return view('admin.blog.create')->with('menu','blog');
     }
  
     public function store(Request $request){
        $request->validate([
           'judul'=>'required',
           'konten'=>'required',
           'cover'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           'tgl_publis'=>'required',
           'status'=>'required',
        ]);
        
        $cover = storeImgSize($request->file('cover'),'blog',800,500);
        $slug= createSlug($request->judul,Blog::class);
  
        $store =Blog::create([
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
  
        session()->flash('success','Blog Guru berhasil di tambah.');
  
        return redirect(route('blog.index'));
  
     }
  
     public function show($id){
       $blog=Blog::find($id);
        if(!$blog) return redirect(route('blog.index'));

        if($blog->user_id!=auth()->user()->id)  return redirect(route('blog.index'));
  
        return view('admin.blog.show')
           ->with('blog',$blog)
           ->with('menu','blog');
     }
  
     
     public function edit($id){
       $blog=Blog::find($id);
        if(!$blog) return redirect(route('blog.index'));
        if($blog->user_id!=auth()->user()->id)  return redirect(route('blog.index'));
  
        return view('admin.blog.edit')
           ->with('blog',$blog)
           ->with('menu','blog');
     }
  
     public function update(Request $request,$id){
  
       $blog=Blog::find($id);
        if(!$blog) return redirect(route('blog.index'));
        if($blog->user_id!=auth()->user()->id)  return redirect(route('blog.index'));
  
        $request->validate([
           'judul'=>'required', 
           'konten'=>'required',       
        ]);
  
        $data=$request->only(['judul','subjudul','konten','tgl_publis','status']);
       
        $slug= createSlug($request->judul,Blog::class);
        $data['slug']=$slug;
  
        if($request->cover){
           $cover = storeImgSize($request->file('cover'),'blog',800,500);
           if($cover){
              deleteFile($blog->cover);
              $data['cover']=$cover;
           }
        }
  
       $blog->update($data);
        
        session()->flash('success','Blog berhasil diubah. ');
        return redirect(route('blog.index'));
     }
  
     public function delete(Request $request){
       
       $blog=Blog::find($request->id);
 
    
  
        if(!$blog) {
           session()->flash('error','Data tidak ditemukan.');
        }else{
            if($blog->user_id!=auth()->user()->id)  return redirect(route('blog.index'));
           session()->flash('success','Blog '.$blog->judul.' berhasil dihapus. ');
           deleteFile($blog->cover);
          $blog->delete();
        }
  
        return redirect(route('blog.index'));
     }


     //BLOG ADMIN
     public function blogadminindex(){
        $blogs=Blog::orderby('tgl_publis','desc')->get();
         return view('admin.blog.indexadmin')
            ->with('blogs',$blogs)
            ->with('menu','blog');
      }

      public function showadmin($id){
        $blog=Blog::find($id);
         if(!$blog) return redirect(route('blogadmin.index'));
   
         return view('admin.blog.showadmin')
            ->with('blog',$blog)
            ->with('menu','blog');
      }

      public function statusblog($id){
        $blog=Blog::find($id);
        if(!$blog) return redirect(route('blogadmin.index'));

        if($blog->status==0){
            $status=1;
        }else{
            $status=0;
        }

        $blog->update(['status'=>$status]);
        session()->flash('success','Status Blog berhasil di ubah. ');
        return redirect(route('blogadmin.index'));
      }
   
  }
  