<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    Route::get('login', [UserController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('coffee', function () {
                return response('ok');
            });
        });
    });
});


