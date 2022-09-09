<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

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
// Route::get('/services/{service}', [ServiceController::class, 'edit'])->name('services.edit');
// Route::post('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
// Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');