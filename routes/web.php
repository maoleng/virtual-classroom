<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
