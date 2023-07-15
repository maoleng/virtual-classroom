<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class CourseController extends Controller
{

    public function index(): View
    {
        $courses = services()->courseService()->withCount('lectures')->with('user')->paginate(6);

        return view('course.index', [
            'courses' => $courses,
        ]);
    }

    public function show($slug)
    {
        $course = services()->courseService()->where('slug', $slug)->with(['user', 'lectures', 'users'])->firstOrFail();

        return view('course.show', [
            'course' => $course,
        ]);
    }

}
