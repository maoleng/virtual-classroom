<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('index');


Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
    Route::get('/', [CourseController::class, 'course'])->name('index');
    Route::get('/{slug}', [CourseController::class, 'show'])->name('show');
});


