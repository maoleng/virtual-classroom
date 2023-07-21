<?php

use App\Http\Controllers\Api\LectureController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\App\TeacherRole;
use App\Http\Middleware\App\IfAlreadyChooseRole;
use App\Http\Middleware\App\IfAlreadyLogin;
use App\Http\Middleware\App\MustLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::group(['middleware' => [MustLogin::class, IfAlreadyChooseRole::class]], function () {
    Route::get('/choose_role', [AuthController::class, 'chooseRole'])->name('choose_role');
    Route::get('/choose_role/{role}', [AuthController::class, 'processChooseRole'])->name('process_choose_role');
});
Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => [IfAlreadyLogin::class]], static function () {
    Route::get('/redirect', [AuthController::class, 'redirect'])->name('redirect');
    Route::get('/callback', [AuthController::class, 'callback'])->name('callback');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/create', [CourseController::class, 'create'])->name('create')->middleware(TeacherRole::class);
    Route::get('/{slug}', [CourseController::class, 'show'])->name('show');
    Route::group(['middleware' => [MustLogin::class]], function () {
        Route::get('/{slug}/checkout', [CourseController::class, 'checkout'])->name('checkout');
        Route::get('/{slug}/{lecture_slug}', [CourseController::class, 'lecture'])->name('lecture');
        Route::get('/{slug}/{lecture_slug}/document', [CourseController::class, 'lectureDocument'])->name('lecture_document');
        Route::get('/{slug}/{lecture_slug}/quiz', [CourseController::class, 'quiz'])->name('quiz');
        Route::get('/{slug}/{lecture_slug}/quiz_result', [CourseController::class, 'quizResult'])->name('quiz_result');
        Route::get('/{slug}/{lecture_slug}/assignment', [CourseController::class, 'assignment'])->name('assignment');
        Route::get('/{slug}/{lecture_slug}/assignment_submit', [CourseController::class, 'assignmentSubmit'])->name('assignment_submit');
        Route::get('/{slug}/{lecture_slug}/teacher_interact', [CourseController::class, 'teacherInteract'])->name('teacher_interact');
        Route::post('/ask', [LectureController::class, 'ask'])->name('ask');
    });
});
Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function () {
    Route::post('/{course}', [CheckoutController::class, 'checkout'])->name('process');
    Route::get('/success', [CheckoutController::class, 'validatePayment'])->name('success');
});

