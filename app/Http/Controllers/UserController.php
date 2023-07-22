<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function enrolledCourse()
    {
        $courses = Course::query()->with(['user', 'lectures', 'users'])->orderByDesc('created_at')->get();

        return view('user.enrolled_course', [
            'enrolled_courses' => $courses->take(5),
            'completed_courses' => $courses->skip(5)->take(4),
        ]);
    }

    public function course(): View
    {

    }

}
