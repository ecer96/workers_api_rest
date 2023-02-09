<?php

use App\Http\Controllers\WorkersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('api')->group(function(){
    Route::post('createWorker',[WorkersController::class,'store']);
    Route::get('showWorkers',[WorkersController::class,'index']);
    Route::get('showWorker/{id}',[WorkersController::class,'show']);
    Route::delete('deleteWorker/{id}',[WorkersController::class,'destroy']);
    Route::put('updateWorker/{id}',[WorkersController::class,'update']);
});