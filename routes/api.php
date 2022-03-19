<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoffeeController;

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



Route::prefix('v1')->group(function () {
    Route::post('/login', [UserController::class, 'login'])->name("login");

    Route::middleware('auth:api')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('coffees')->group(function () {
                Route::controller(CoffeeController::class)->group(function () {
                    Route::get('/', 'index');
                    Route::post('/', 'store');
                    Route::get('/{id}', 'show');
                    Route::post('/{id}', 'update');
                    Route::delete('/{id}', 'destroy');
                });
            });
        });
    });
});


