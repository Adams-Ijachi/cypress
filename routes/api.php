<?php

use App\Http\Controllers\Api\UserActivitiesController;
use App\Http\Controllers\Api\UserRegisterController;
use App\Http\Controllers\UserLoginController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserRegisterController::class,'__invoke'])
    ->name('api.user.register');

Route::post('login',[UserLoginController::class,'__invoke'])
    ->name('api.user.login');

Route::middleware('auth:sanctum')
    ->get('user/activities',[UserActivitiesController::class,'__invoke']);


