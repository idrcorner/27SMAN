<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepsek;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Informasi;

class WebController extends Controller
{
    public function index(){
      
        return view('front.index')
            ->with('sliders',Slider::all())
            ->with('kepsek',Kepsek::find(1))
            ->with('informasis',Informasi::where('status',1)->orderby('tgl_publis','desc')->limit(9)->get())
            ->with('artikels',Blog::where('status',1)->orderby('tgl_publis','desc')->limit(6)->get())
            ->with('menu','home'); 
    }
}
