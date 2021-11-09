<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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


Route::get('/contact', [ContactController::class, 'contact']);
Route::post('/contact', [ContactController::class, 'post']);
Route::post('/contact/confirm', [ContactController::class, 'confirm']);
Route::post('/contact/complete', [ContactController::class, 'complete']);

Route::get('/contact/management', [ContactController::class, 'management']);
Route::post('/contact/management', [ContactController::class, 'search']);

Route::post('/contact/management/delete/{id}', [ContactController::class, 'delete']);
