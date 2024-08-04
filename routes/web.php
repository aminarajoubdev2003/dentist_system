<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add_pat', [App\Http\Controllers\PatientController::class, 'create'])->name('create_pat');
Route::post('/add_pat', [App\Http\Controllers\PatientController::class, 'store'])->name('add_pat');
Route::get('/add_appointment', [App\Http\Controllers\AppointmentController::class, 'create'])->name('create_appoin');
Route::post('/add_appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('add_appoin');
Route::get('/edit_appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'edit'])->name('edit_appoin');
Route::post('/edit_appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'update'])->name('update_appoin');
Route::delete('/delete_appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'destroy'])->name('delete_appoin');
Route::get('/all_appointment/{doctor_id}', [App\Http\Controllers\AppointmentController::class, 'index'])->name('all_appoin');
Route::get('/all_pat', [App\Http\Controllers\PatientController::class, 'index'])->name('all_pat');
