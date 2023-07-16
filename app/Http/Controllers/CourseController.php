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

    public function show($slug): View
    {
        $course = services()->courseService()->where('slug', $slug)->with(['user', 'lectures', 'users'])->firstOrFail();

        return view('course.show', [
            'course' => $course,
        ]);
    }

    public function checkout($slug): View
    {
        $course = services()->courseService()->where('slug', $slug)->with(['user', 'lectures', 'users'])->firstOrFail();

        return view('course.checkout', [
            'course' => $course,
        ]);
    }

    public function lecture($slug, $lecture_slug)
    {
        $course = services()->courseService()->where('slug', $slug)->with(['lectures', 'users'])->firstOrFail();
        $lecture = $course->lectures->where('slug', $lecture_slug)->firstOrFail();

        return view('lecture.index', [
            'course' => $course,
            'lecture' => $lecture,
        ]);
    }

    public function lectureDocument($slug, $lecture_slug)
    {
        $course = services()->courseService()->where('slug', $slug)->with(['lectures', 'users'])->firstOrFail();
        $lecture = $course->lectures->where('slug', $lecture_slug)->firstOrFail();

        return view('lecture.document', [
            'course' => $course,
            'lecture' => $lecture,
        ]);
    }

}
