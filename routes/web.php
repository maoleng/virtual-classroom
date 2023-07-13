<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/course', [SiteController::class, 'course'])->name('course');
Route::get('/course/{slug}', [SiteController::class, 'show'])->name('course.show');



