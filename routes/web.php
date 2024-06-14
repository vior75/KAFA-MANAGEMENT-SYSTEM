<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bulletincontroller;

Route::redirect('/', '/bulletins');
Route::resource('bulletins', Bulletincontroller::class);

// Optionally, if you have a welcome view and you still want to keep this route, do so:
Route::get('/', function () {
    return view('welcome');
});
