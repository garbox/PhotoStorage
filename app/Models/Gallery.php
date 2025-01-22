<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Gallery extends Model
{
    public static function galleryCreate(array $validation){
        Gallery::insert([
            "gallery_name" => $validation['galleryName'],
            "gallery_description" => $validation['description'],
            "user_id" => AUTH::user()->id,
        ]);
    }
}
