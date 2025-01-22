<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // store photo info on server to pull via Async
    public function store(){
        
    }

    public static function photosByGallery(int $galleryId){
        return Photo::where("gallery_id", $galleryId)->get();
    }
}
