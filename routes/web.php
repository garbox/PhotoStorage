<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\FolderController;
use App\Models\Photo;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Show the photo upload form (assuming you have a controller for this route)
Route::get('/', [PhotoController::class, 'index']);
Route::get('mobile/{session}', [PhotoController::class, 'index']);
Route::post('/upload', [PhotoController::class, 'upload']);
Route::get('/photos', [PhotoController::class, 'getPhotoAsync']);

Route::get('/login', [UserController::class, 'index']);

Route::get('folders', [FolderController::class, 'index']);
Route::post('folders', [FolderController::class, 'folderCreate']);
Route::get('folder/{id}', [FolderController::class, 'getContents']);


require __DIR__.'/auth.php';
