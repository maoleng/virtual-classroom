<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Middleware\ApiAuthenticate;
use App\Http\Middleware\TeacherRole;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], static function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['prefix' => 'course'], static function () {
    Route::get('/', [CourseController::class, 'index']);
    Route::get('/{id}', [CourseController::class, 'show']);
});

Route::group(['prefix' => 'app', 'middleware' => [ApiAuthenticate::class]], static function () {
    Route::group(['prefix' => 'course', 'middleware' => [TeacherRole::class]], static function () {
        Route::post('/', [CourseController::class, 'store']);
        Route::put('/{id}', [CourseController::class, 'update']);
        Route::delete('/{id}', [CourseController::class, 'destroy']);
    });


});
