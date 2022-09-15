<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::get('/services/delete/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::get('/services/{service}', [ServiceController::class, 'edit'])->name('services.edit');
Route::post('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::get('/service/schedule/{service}',[ServiceController::class, 'service_schedule'])->name('service.schedule');

Route::get('/schedule/delete/{schedule}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');

Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');