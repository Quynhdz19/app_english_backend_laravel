<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', function () {
    return 'oki';
});

Route::get('getAllUsers', [\App\Http\Controllers\UserController::class, 'getAllUser']);
