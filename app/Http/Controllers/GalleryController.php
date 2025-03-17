<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Photo;
use App\Models\QrTokenCode;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index(){
        return view('dashboard', ['galleries' => Gallery::where('user_id', Auth::user()->id)->get()]);
    }

    // create folder via async method
    public function create(Request $request){
        $validation = $request->validate([
            "galleryName" => 'string|required',
            "description" => "string|required",
        ]);
        Gallery::galleryCreate($validation);

        return redirect()->route('dashboard');
    }

    public function get(int $galleryId){
        $galleryContents = Photo::photosByGallery($galleryId);
        $gallery = Gallery::find($galleryId);
        $qrCodeToken = QrTokenCode::createToken();
        return view('gallery', ['contents' => $galleryContents, 'gallery' => $gallery, "qrToken" => $qrCodeToken]);
    }
}
