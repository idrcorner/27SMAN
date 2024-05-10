<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users=User::orderby('name')->get();
        return view('admin.user.index')
           ->with('users',$users)
           ->with('menu','user');
     }
     public function create(){
      return view('admin.user.create')->with('menu','user');
     }

     public function delete(Request $request){
       
        $user=User::find($request->id);
  
        if(!$user) {
           session()->flash('error','Data tidak ditemukan.');
        }else{
           session()->flash('success','User '.$user->name.' berhasil dihapus. ');
          $user->delete();
        }
  
        return redirect(route('user.index'));
     }

          
     public function edit($id){
        $user=User::find($id);
        if(!$user) return redirect(route('user.index'));
  
        return view('admin.user.edit')
           ->with('user',$user)
           ->with('menu','user');
     }

     public function update(Request $request,$id){
  
        $user=User::find($id);
        if(!$user) return redirect(route('user.index'));

        if($user->id==auth()->user()->id) return redirect(route('user.index'));

        $request->validate([
           'name'=>'required', 
           'username'=>'required',       
           'role'=>'required',    
           'password' => [ 'confirmed'],   
        ]);
  
        $data=$request->only(['name','username','role']);

        if($request->password!=''){
            $data['password']=Hash::make($request->password);
        }
          
        $user->update($data);
        
        session()->flash('success','User berhasil diubah. ');
        return redirect(route('user.index'));
     }

}  