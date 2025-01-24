<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LaravelQRCode\Facades\QRCode;
use App\Models\Photo;
use App\Models\QrcodeToken;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function index(int $userId, int $galleryId, string $qrToken){
        if(QrcodeToken::checkToken($qrToken, $userId)){
            session()->regenerate();
            return view('upload', ['galleryId' => $galleryId, 'userId' => $userId]);
        }
        else{
            session()->flash('error', 'Invalid Token, refresh gallery and try QR code again.');
            return view('auth.login');
        }
        
    }
    
    public function upload(Request $request){
        // Validate the uploaded file
        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'galleryId' => 'integer|nullable',
            'userId' => 'integer|nullable',
            ], 
            [
                'photos.required' => 'A photo is required.',
                'photos.image' => 'The uploaded file must be an image.',
                'photos.mimes' => 'The image must be a JPEG, PNG, JPG, or GIF.',
                'photos.max' => 'The image must not be greater than 5MB.',
            ]);

            //set folder and user ID 
            if($request->userId !== null){
                $userId = $request->userId;
            }
            else{
                $userId = Auth::user()->id;
            }
            $size = 0;
            foreach ($request->file('photos') as $file) {
                // Get file size
                // Store each file in a folder (e.g., 'photos')
                $size = $size + $file->getSize();
                $file->store('photos', 'public');
                
        
                Photo::insert([
                    'filename' => $file->hashName(),
                    'user_id' => $userId,
                    'gallery_id' => $request->galleryId,
                    "size_mb" => $file->getSize()/1000000,
                ]);
            } 
            return back()->with('success', 'Photo uploaded successfully');     
    }

    public function photoDisplay(int $photoId){
        return view ('photo', ['photo' => Photo::find($photoId)]);
    }
}

