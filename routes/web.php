<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\GalleryController;
use App\Models\Photo;

Route::get('/', function () {
    return view('welcome');
});

Route::get('mobile/{userId}/{folderId}', [PhotoController::class, 'index'])->name('mobile.upload');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [GalleryController::class, 'index'])->name('dashboard');

    Route::get('/gallery/{id}', [GalleryController::class, 'get'])->name('gallery.get');
    Route::post('/gallery', [GalleryController::class, 'create'])->name('gallery.create');

    Route::get('/photo/{photoId}', [PhotoController::class, 'photoDisplay'])->name('photo.get');
    Route::post('/photo', [PhotoController::class, 'upload'])->name('photo.upload');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    
    
    
});






require __DIR__.'/auth.php';
