<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InformationsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

Route::post('add-info',[InformationsController::class,'addInfo']);
Route::get('get-info',[InformationsController::class,'getInfo']);
Route::DELETE('delete-info/{id}',[InformationsController::class,'deleteInfo']);
Route::PUT('update-info/{id}',[InformationsController::class,'updateInfo']);
