<?php

use App\Http\Controllers\MedicalDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SensorsController;
use App\Http\Controllers\UserInfoController;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Profile
Route::get('/profile', [UserInfoController::class, 'get'])
    ->middleware(['auth'])
    ->name('profile');
Route::post('/profile', [UserInfoController::class, 'store'])
    ->middleware(['auth'])
    ->name('profile');


//TODO
Route::get('/agenda', function () {
    return view('agenda');
})
->middleware(['auth'])
->name('agenda');


//Restaurant
Route::get('/restaurant', [RestaurantController::class, 'index'])
    ->middleware(['auth'])
    ->name('restaurant.index');

Route::get('/restaurant/{id}', [RestaurantController::class, 'show'])
    ->middleware(['auth'])
    ->name('restaurant.show');

Route::get('/restaurant/{id}/filter', [RestaurantController::class, 'showFilterForm'])
    ->middleware(['auth'])
    ->name('restaurant.filter');

Route::get('/restaurant/{id}/create', [RestaurantController::class, 'create'])
    ->middleware(['auth'])
    ->name('restaurant.create');

Route::post('/restaurant/{id}/store', [RestaurantController::class, 'store'])
    ->middleware(['auth'])
    ->name('restaurant.store');


//TODO
Route::get('/meddata', [MedicalDataController::class, 'index'])
    ->middleware(['auth'])
    ->name('meddata');


//Hospital Sensors
Route::get('/sensors', [SensorsController::class, 'index'])
    ->name('sensors');

Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/getUser', [UserInfo::class, 'getUserInfo'])->name('getUser');

require __DIR__.'/auth.php';
