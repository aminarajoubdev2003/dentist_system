<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

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

Route::get("review/add/form",[ReviewController::class,"create"])->name("review_form");
Route::post("review/add",[ReviewController::class,"store"])->name("add_review");
//Route::get("review/edit/{id}",[ReviewController::class,"edit"])->name("edit_review");
//Route::post('review/update/{id}', [ReviewController::class, 'update'])->name('update_review');
Route::get("reviews/all",[ReviewController::class,"index"])->name("all_reviews");
Route::get("show/review",[ReviewController::class,"show"])->name("show_review");
Route::get('review/delete/{id}', [ReviewController::class, 'destroy'])->name('delete_review');
Route::get("average/rate/form",[ReviewController::class,"view_doctorrate"]);
Route::post("average/rate",[ReviewController::class,"getRateAvarege"])->name("view_doctorrate");