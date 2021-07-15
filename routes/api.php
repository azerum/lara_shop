<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CategoryController;
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

Route::group(['prefix' => 'categories'], function() {
    Route::get('/', [CategoryController::class, 'getAll']);
    Route::post('/', [CategoryController::class, 'create']);
    Route::patch('/{category}', [CategoryController::class, 'patch']);
    Route::delete('/{category}', [CategoryController::class, 'delete']);
});

Route::group(['prefix' => 'albums'], function() {
    Route::post('/', [AlbumController::class, 'create']);
    Route::post('/{album}', [AlbumController::class, 'uploadImages']);
});
