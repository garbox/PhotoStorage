<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class QrcodeToken extends Model
{
    //create and store token for cross platform validation.
    public static function createToken(){
        $qrToken = Str::random(32);
        
        QrcodeToken::insert([
            "token" => $qrToken,
            "user_id" => Auth::user()->id,
        ]);

        return $qrToken;
    }

    public static function checkToken(string $qrToken){
        $tokenSet = QrcodeToken::where('token', $qrToken)->get();
        if(!$tokenSet->isEmpty()){
            return true;
        }
        else{
            return false;
        }
    }
}
