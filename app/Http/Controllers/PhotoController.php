<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LaravelQRCode\Facades\QRCode;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function index(int $galleryId, int $userId, string $session){
        session()->setId($session);
        return view('upload', ['galleryId' => $galleryId, 'userId' => $userId]);
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
            if($request->userId != null){
                $userId = $request->userId;
            }
            else{
                $userId = Auth::user()->id;
            }

            $uploadedFiles = $request->file('photos');
            foreach ($uploadedFiles as $file) {
                // Store each file in a folder (e.g., 'photos')
                $file->store('photos', 'public');
        
                Photo::insert([
                    'session_id' => session()->getId(),
                    'filename' => $file->hashName(),
                    'user_id' => $userId,
                    'gallery_id' => $request->galleryId,
                ]);
            } 
            return back()->with('success', 'Photo uploaded successfully');     
    }

    public function photoDisplay(int $photoId){
        return view ('photo', ['photo' => Photo::find($photoId)]);
    }
}

