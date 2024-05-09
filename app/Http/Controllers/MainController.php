<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class MainController extends Controller
{
    public function dashboard(){
        $quote = Quote::inRandomOrder()->take(1)->first();
        return view('admin.dashboard')
            ->with('quote',$quote)
            ->with('menu','dashboard');
    }
}
