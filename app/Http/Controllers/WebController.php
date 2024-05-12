<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepsek;
use App\Models\Slider;
use App\Models\Quote;
use App\Models\Profile;
use App\Models\Video;
use App\Models\Foto;
use App\Models\Guru;
use App\Models\Blog;
use App\Models\Informasi;

class WebController extends Controller
{
    public function index(){
      
        return view('front.index')
            ->with('sliders',Slider::all())
            ->with('kepsek',Kepsek::find(1))
            ->with('informasis',Informasi::where('status',1)->orderby('tgl_publis','desc')->limit(9)->get())
            ->with('quotes', Quote::inRandomOrder()->take(7)->get())
            ->with('artikels',Blog::where('status',1)->orderby('tgl_publis','desc')->limit(6)->get())
            ->with('videos',Video::limit(4)->orderby('created_at','desc')->get())
            ->with('menu','home'); 
    }

    public function tentangkamidetail($slug){
        $tentang=Profile::where('slug',$slug)->first();
        if(!$tentang) return redirect(route('home'));

        $view=$tentang->view +1;
        $tentang->update(['view'=>$view]);

        return view('front.detailtentang')
        ->with('kepsek',Kepsek::find(1))
            ->with('tentang',$tentang)
            ->with('menu','tentangkami'); 
    }
    public function listinformasi(){
        $informasis=Informasi::where('status',1)->orderby('tgl_publis','desc')->paginate(20);
        

        return view('front.listinformasi')
        ->with('kepsek',Kepsek::find(1))
            ->with('informasis',$informasis)
            ->with('menu','informasi'); 
    }
    public function listblog(){
        $blogs=Blog::where('status',1)->orderby('tgl_publis','desc')->paginate(20);
        

        return view('front.listblog')
        ->with('kepsek',Kepsek::find(1))
            ->with('blogs',$blogs)
            ->with('menu','blog'); 
    }
    public function detailinformasi($slug){
        $informasi=Informasi::where('slug',$slug)->first();
        if(!$informasi) return redirect(route('home'));

        $view=$informasi->view +1;
        $informasi->update(['view'=>$view]);

        $informasis=Informasi::where('status',1)->orderby('tgl_publis','desc')->limit(3)->get();
        $informasipop=Informasi::where('status',1)->orderby('view','desc')->limit(8)->get();
        $fotos=Foto::orderby('created_at','desc')->limit(2)->get();
        $videos=Video::orderby('created_at','desc')->limit(2)->get();
        $quote = Quote::inRandomOrder()->take(1)->first();

        return view('front.detailinformasi')
        ->with('kepsek',Kepsek::find(1))
            ->with('quote',$quote)
            ->with('fotos',$fotos)
            ->with('videos',$videos)
            ->with('informasis',$informasis)
            ->with('informasipop',$informasipop)
            ->with('informasi',$informasi)
            ->with('menu','informasi'); 
    }
    public function detailblog($slug){
        $informasi=Blog::where('slug',$slug)->first();
        if(!$informasi) return redirect(route('home'));

        $view=$informasi->view +1;
        $informasi->update(['view'=>$view]);

        $informasis=Blog::where('status',1)->orderby('tgl_publis','desc')->limit(8)->get();
        $informasipop=Blog::where('status',1)->orderby('view','desc')->limit(8)->get();
        $beritas=Informasi::where('status',1)->orderby('created_at','desc')->limit(7)->get();
        $quote = Quote::inRandomOrder()->take(1)->first();
        $fotos=Foto::orderby('created_at','desc')->limit(2)->get();
        $videos=Video::orderby('created_at','desc')->limit(2)->get();

        return view('front.detailblog')
        ->with('kepsek',Kepsek::find(1))
            ->with('quote',$quote)
            ->with('fotos',$fotos)
            ->with('videos',$videos)
            ->with('beritas',$beritas)
            ->with('informasis',$informasis)
            ->with('informasipop',$informasipop)
            ->with('informasi',$informasi)
            ->with('menu','blog'); 
    }

    public function listguru(){
        $gurus=Guru::orderby('nama')->paginate(20);
        

        return view('front.listguru')
        ->with('kepsek',Kepsek::find(1))
            ->with('gurus',$gurus)
            ->with('menu','blog'); 
    }

    
}
