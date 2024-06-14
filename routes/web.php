<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BulletinController;

// Redirect root to bulletins index
Route::redirect('/', '/bulletins');

// Resource route for admin bulletin management
Route::resource('bulletins', Bulletincontroller::class);

// Custom route for user bulletin board view
Route::get('/Ubulletinboard', [Bulletincontroller::class, 'userIndex'])->name('Ubulletinboard');

// Route for showing a single bulletin in user view
Route::get('/Ubulletinboard/{bulletin}', [Bulletincontroller::class, 'userShow'])->name('Ubulletinboard.show');

// Optionally, if you have a welcome view and you still want to keep this route
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');
