<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\UsersController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('datadiri' , DataDiriController::class);
Route::group(['prefix' => 'v1'], function(){
    Route::post('login', [UsersController::class , 'login']);
    Route::post('register', [UsersController::class , 'register']);
    Route::get('logout', [UsersController::class , 'logout'])->middleware('auth:api');
   });
