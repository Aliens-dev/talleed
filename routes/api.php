<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Tags\TagController;
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

Route::group(['prefix' => 'tags'], function() {
    Route::get('/', [TagController::class,'index']);
});

