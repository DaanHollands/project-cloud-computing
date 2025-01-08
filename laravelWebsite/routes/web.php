<?php

use App\grpc\GPBMetadata\App\Grpc\MedicalData;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicalDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SensorsController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Profile
Route::get('/profile', [UserInfoController::class, 'get'])
    ->middleware(['auth'])
    ->name('profile');
Route::post('/profile', [UserInfoController::class, 'store'])
    ->middleware(['auth'])
    ->name('profile');


//Agenda
Route::get('/agenda', [AgendaController::class, 'index'])
    ->middleware(['auth'])
    ->name('agenda.index');
Route::get('/agenda/create', [AgendaController::class, 'create'])
    ->middleware(['auth'])
    ->name('agenda.create');
Route::get('/agenda/{id}', [AgendaController::class, 'show'])
    ->middleware(['auth'])
    ->name('agenda.show');
Route::post('/agenda', [AgendaController::class, 'store'])
    ->middleware(['auth'])
    ->name('agenda.store');


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


//Medical Recors & Invoices
Route::get('/meddata', [MedicalDataController::class, 'index'])
    ->middleware(['auth'])
    ->name('meddata.index');
Route::get('/meddata/record/{id}', [MedicalDataController::class, 'show_record'])
    ->middleware(['auth'])
    ->name('meddata.record.show');
Route::get('/meddata/invoice/{id}', [MedicalDataController::class, 'show_invoice'])
    ->middleware(['auth'])
    ->name('meddata.invoice.show');   

//Hospital Sensors
Route::get('/sensors', [SensorsController::class, 'index'])
    ->name('sensors');

require __DIR__.'/auth.php';
