<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $guarded=[];

    function jumlahFoto(){
       return Foto::where('album_id',$this->id)->count();
    }

    function getfoto(){
       $foto= Foto::where('album_id',$this->id)->first();
       if(!$foto) return 'public/foto/noimage.jpg';

       return $foto->foto;
    }
}
