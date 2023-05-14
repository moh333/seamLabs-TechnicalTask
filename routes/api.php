<?php

use App\Http\Controllers\API\AlphabeticStringController;
use App\Http\Controllers\API\CountNumbersController;
use App\Http\Controllers\API\MinimizeStepsController;
use App\Http\Controllers\API\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function () {
    Route::get('count_numbers', [CountNumbersController::class, 'index']);
    Route::get('get_index', [AlphabeticStringController::class, 'index']);
    Route::get('minimize_steps', [MinimizeStepsController::class, 'index']);
    Route::post('createOrder', [OrderController::class, 'index']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
