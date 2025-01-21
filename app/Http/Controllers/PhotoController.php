<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LaravelQRCode\Facades\QRCode;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index($session = null){
        // Get the session ID
        if($session !== null){
            session()->setId($session);
        }
        else{
            session()->getId();
        }

        //get photos if any
        $photosData = Photo::where('session_id', session()->getId())->get();

        // Redirect to another route and append session ID as a query parameter
        return view('upload', ['photos' => $photosData]);
    }
    
    public function upload(Request $request){
        // Validate the uploaded file
        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ], 
            [
                'photos.required' => 'A photo is required.',
                'photos.image' => 'The uploaded file must be an image.',
                'photos.mimes' => 'The image must be a JPEG, PNG, JPG, or GIF.',
                'photos.max' => 'The image must not be greater than 5MB.',
            ]);
            $uploadedFiles = $request->file('photos');
            foreach ($uploadedFiles as $file) {
                // Store each file in a folder (e.g., 'photos')
                $file->store('photos', 'public');
        
                Photo::insert([
                    'session_id' => session()->getId(),
                    'filename' => $file->hashName(),
                    'user_id' => 1,
                    'folder_id' => 1,
                ]);
            } 
            return back()->with('success', 'Photo uploaded successfully');     
    }

    public function getPhotoAsync(){
        // Get photos by session ID
        $photos = Photo::where('session_id', session()->getId())->get();

        // Return the photos as a JSON response
        return response()->json($photos);
    }
}

