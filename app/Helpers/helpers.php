<?php
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

if (!function_exists('myHelperFunction')) {
    function appName(){return 'SMAN 27 BATAM';}
    
    function namabulan($angkabulan){
        $a=(int)$angkabulan;
        $namabulan='';
        switch($a){
            case 1 : $namabulan='Januari';break;
            case 2 : $namabulan='Februari';break;
            case 3 : $namabulan='Maret';break;
            case 4 : $namabulan='April';break;
            case 5 : $namabulan='Mei';break;
            case 6 : $namabulan='Juni';break;
            case 7 : $namabulan='Juli';break;
            case 8 : $namabulan='Agustus';break;
            case 9 : $namabulan='September';break;
            case 10 : $namabulan='Oktober';break;
            case 11 : $namabulan='November';break;
            case 12 : $namabulan='Desember';break;
            default : $namabulan='';break;
        }
        return $namabulan;
    }

    function storeFile($fileRequest,$folder){
        $file = $fileRequest;
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        return $file->storeAs('public/'.$folder, $fileName);
    }

    function storeImgSize($fileRequest,$folder,$width,$height){
        $file = $fileRequest;
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $image = Image::read($file);
 
        $image->cover($width, $height);
        $image->save(storage_path('app/public/'.$folder.'/'.$fileName));
           
        return 'public/'.$folder.'/'.$fileName;
     }

    function createSlug($judul,$model){
        $judulSlug=Str::slug($judul);
        $jmlSlug=$model::where('slug',$judulSlug)->count();
        if($jmlSlug>0){
            return $judulSlug.$jmlSlug;
        }
        return $judulSlug;
    }

    function getUsername($user_id){
        $user=User::find($user_id);
        if($user) return $user->name;
        return '-';
    }

   function deleteFile($filePath)
{
  if (Storage::exists($filePath)) { 
        Storage::delete($filePath);
        return true;
    } else {
        return false;
    }
}
}