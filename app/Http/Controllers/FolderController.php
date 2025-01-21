<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Photo;

class FolderController extends Controller
{
    public function index(){
        return view('folder', ['folders' => Folder::where('user_id', 1)->get()]);
    }

    // create folder via async method
    public function create(){
        
    }

    public function getContents(int $folderId){
        $folderContents = Photo::photosByFolder($folderId);
        return view('photos', ['contents' => $folderContents]);
    }
}
