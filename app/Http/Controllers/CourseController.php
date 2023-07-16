<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
        $is_registered = services()->courseService()->isRegistered($course);

        return view('course.show', [
            'course' => $course,
            'is_registered' => $is_registered,
        ]);
    }

    public function checkout($slug): View|RedirectResponse
    {
        $course = services()->courseService()->where('slug', $slug)->with(['user', 'lectures', 'users'])->firstOrFail();
        if (services()->courseService()->isRegistered($course)) {
            return redirect()->back();
        }

        return view('course.checkout', [
            'course' => $course,
        ]);
    }

    public function lecture($slug, $lecture_slug): View|RedirectResponse
    {
        $course = services()->courseService()->where('slug', $slug)->with(['lectures', 'users'])->firstOrFail();
        $is_registered = services()->courseService()->isRegistered($course);
        if (! $is_registered) {
            return redirect()->route('course.show', ['slug', $course->slug]);
        }
        $lecture = $course->lectures->where('slug', $lecture_slug)->firstOrFail();

        return view('lecture.index', [
            'course' => $course,
            'lecture' => $lecture,
        ]);
    }

    public function lectureDocument($slug, $lecture_slug): View|RedirectResponse
    {
        $course = services()->courseService()->where('slug', $slug)->with(['lectures', 'users'])->firstOrFail();
        $is_registered = services()->courseService()->isRegistered($course);
        if (! $is_registered) {
            return redirect()->route('course.show', ['slug', $course->slug]);
        }
        $lecture = $course->lectures->where('slug', $lecture_slug)->firstOrFail();

        return view('lecture.document', [
            'course' => $course,
            'lecture' => $lecture,
        ]);
    }

}
