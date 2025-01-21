<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // store photo info on server to pull via Async
    public function photoUplaod(){

    }

    public static function photosByFolder(int $folderId){
        return Photo::where("folder_id", $folderId)->get();
    }
}
