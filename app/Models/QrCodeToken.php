<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class QrcodeToken extends Model
{
    protected $fillable = ['token', 'user_id'];

    // Create and store token for cross-platform validation
    public static function createToken(){
        $qrToken = Str::random(32);

        return self::create([
            'token' => $qrToken,
            'user_id' => Auth::id(), // Prevents error if user is not logged in
        ])->token;
    }

    public static function checkToken(string $qrToken, int $userId): bool{
        return self::where('token', $qrToken)
            ->where('user_id', $userId)
            ->exists(); // More efficient than get()->isEmpty()
    }
}
