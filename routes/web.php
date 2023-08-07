<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserController;
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



Route::get('/login', [AdminLoginController::class,'show'])->name('login');
Route::post('/login', [AdminLoginController::class,'login'])->name('login.post');


Route::name('dashboard.')->middleware(['auth','user.is.admin'])->group(function () {



    Route::group(['prefix' => 'activities'], function (){

        Route::get('/', [ActivityController::class,'index'])->name('activities');


        Route::get('/create', [ActivityController::class,'create'])->name('activities.create');
        Route::post('/create', [ActivityController::class,'store'])->name('activities.create.post');

        Route::get('/{activity}/edit', [ActivityController::class,'edit'])->name('activities.edit');
        Route::post('/{activity}/edit', [ActivityController::class,'update'])->name('activities.edit.update');
        Route::get('/{activity}/delete', [ActivityController::class,'destroy'])->name('activities.delete');

    });


    Route::group(['prefix' => 'users'], function (){

        Route::get('/', [UserController::class,'index'])->name('users');

        Route::get('/{user}/activities', [UserActivityController::class,'index'])->name('users.activities');

        Route::get('/{user}/activities/create', [UserActivityController::class,'create'])
            ->name('users.activities.create');

        Route::post('/{user}/activities/create', [UserActivityController::class,'store'])
            ->name('users.activities.create.post');

        Route::get('/{user}/activities/{activity}/edit', [UserActivityController::class,'edit'])
            ->name('users.activities.edit');

        Route::post('/{user}/activities/{activity}/edit', [UserActivityController::class,'update'])
            ->name('users.activities.edit');

    });




});




