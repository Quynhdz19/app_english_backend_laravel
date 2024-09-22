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

Route::post('register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);
Route::get('getCourses', [\App\Http\Controllers\CourseController::class, 'getAllCourses']);
Route::get('getCourse', [\App\Http\Controllers\CourseController::class, 'getCourseDetail']);
