<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\RepController;

Route::get('/',[RepController::class, 'index']);
Route::get('/reps/anunciar',[RepController::class, 'create'])->middleware('auth');
Route::get('/reps/{id}',[RepController::class, 'show']);
Route::post('/reps',[RepController::class, 'store']);
Route::delete('/reps/{id}',[RepController::class, 'destroy'])->middleware('auth');
Route::get('/reps/edit/{id}',[RepController::class,'edit'])->middleware('auth');
Route::put('/reps/update/{id}', [RepController::class,'update'])->middleware('auth');

Route::get('/dashboard',[RepController::class,'dashboard'])->middleware('auth');

