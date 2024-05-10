<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class WebController extends Controller
{
    public function index(){
      
        return view('front.index')
            
            ->with('menu','home');
    }
}
