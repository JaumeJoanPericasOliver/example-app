<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRolAdmin;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::group(['prefix'=>'admin'], function() {
   
    Route::get('/hola', function ($nom, $professio = null) {
        return 'Hola mon';
    })->name('hola');
    
});


Route::get('/hola/{nom}/{professio?}', function ($nom, $professio = null) {
    return 'Hola '.$nom." Professió ".$professio;
})->whereAlpha('nom')->name('salutacio');


Route::get('/perfil/{user}', function (User $user) {
  return view('perfil', ['user' => $user]);
});

Route::get('/usuaris/{user}', function (User $user) {
    return $user;
});



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

    Route::resource('/post', PostController::class)->middleware('CheckRolAdmin');
    Route::post('/post/{post}/edit/images',[PostController::class, 'image'])->name('post.image');

});

require __DIR__.'/auth.php';
