<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'course'], static function () {
    Route::get('/', [CourseController::class, 'index']);
    Route::get('/{id}', [CourseController::class, 'show']);
});
