<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;

class StorageAllowance extends Model
{
    public static function updateUsed(int $userId, int $storageUsed){
        StorageAllowance::where('user_id' , $userId)->update([
            "storage_used" => $storageUsed,
        ]);
    }

    //get storage information by userId
    public static function storageInfo(int $userId){
        return StorageAllowance::where("user_id" , $userId)->first();
    }

    //relationships 
    public function users():HasOne{
        return $this->hasOne(User::class);
    }
}
