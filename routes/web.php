<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ProfileController::class, 'createToken']);
Route::get('/profile',[ProfileController::class, 'index']);
Route::post('/profile/store',[ProfileController::class, 'store']);
Route::get('/profile/{id}',[ProfileController::class, 'show']);
Route::patch('/profile/{id}/update',[ProfileController::class, 'update']);
Route::delete('/profile/{id}/delete',[ProfileController::class, 'destroy']);