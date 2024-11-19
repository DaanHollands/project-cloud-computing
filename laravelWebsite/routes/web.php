<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInfoController;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [UserInfoController::class, 'get'])
    ->middleware(['auth'])
    ->name('profile');
Route::post('/profile', [UserInfoController::class, 'store'])
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/getUser', [UserInfo::class, 'getUserInfo'])->name('getUser');

require __DIR__.'/auth.php';
