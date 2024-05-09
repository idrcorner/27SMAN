<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function index(){
        $quotes=Quote::orderby('oleh')->get();
        return view('admin.quote.index')
           ->with('quotes',$quotes)
           ->with('menu','quote');
     }
  
     public function create(){
      return view('admin.quote.create')->with('menu','quote');
     }
  
     public function store(Request $request){
      
        $request->validate([
           'quote'=>'required',
           'oleh'=>'required',
           
        ]);
       
        $store =Quote::create([
           'quote'=>$request->quote,
           'oleh'=>$request->oleh,
 
        ]);
  
        if(!$store){
           echo "Terjadi kesalahan! Silahkan periksa koneksi internet, dan coba kembali."; die();
        }
  
        session()->flash('success','Quote berhasil di tambah.');
  
        return redirect(route('quote.index'));
  
     }
  
     public function show($id){
        $quote=Quote::find($id);
        if(!$quote) return redirect(route('quote.index'));
  
        return view('admin.quote.show')
           ->with('quote',$quote)
           ->with('menu','quote');
     }
  
     
     public function edit($id){
        $quote=Quote::find($id);
        if(!$quote) return redirect(route('quote.index'));
  
        return view('admin.quote.edit')
           ->with('quote',$quote)
           ->with('menu','quote');
     }
  
     public function update(Request $request,$id){
  
        $quote=Quote::find($id);
        if(!$quote) return redirect(route('quote.index'));
  
        $request->validate([
           'quote'=>'required', 
           'oleh'=>'required',       
        ]);
  
        $data=$request->only(['quote','oleh']);
        
        $quote->update($data);
        
        session()->flash('success','Quote berhasil diubah. ');
        return redirect(route('quote.index'));
     }
  
     public function delete(Request $request){
       
        $quote=Quote::find($request->id);
  
        if(!$quote) {
           session()->flash('error','Data tidak ditemukan.');
        }else{
           session()->flash('success','Quote berhasil dihapus. ');
           $quote->delete();
        }
  
        return redirect(route('quote.index'));
     }
  }
  