<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $guarded=[];

    function namaalbum(){
        $album=Album::find($this->album_id);
        if(!$album) return "";

        return $album->judul;
    }
}
