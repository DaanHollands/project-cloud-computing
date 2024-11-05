<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    require __DIR__.'/auth.php';
});

Route::get('/', function () {
    return redirect('/home');
});

Route::get('home', function () {
    return view('welcome');
});

Route::get('profile', function() {
    return view('user.profile');
})->middleware('auth')->name('profile');
