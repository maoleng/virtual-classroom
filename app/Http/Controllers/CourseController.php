<?php

namespace App\Http\Controllers;

use App\Models\Question;
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
        $data = $this->getLectureData($slug, $lecture_slug);
        if (! is_array($data)) {
            return $data;
        }

        return view('lecture.index', $data);
    }

    public function lectureDocument($slug, $lecture_slug): View|RedirectResponse
    {
        $data = $this->getLectureData($slug, $lecture_slug);
        if (! is_array($data)) {
            return $data;
        }

        return view('lecture.document', $data);
    }

    public function lectureQuestion($slug, $lecture_slug)
    {
        $data = $this->getLectureData($slug, $lecture_slug);
        if (! is_array($data)) {
            return $data;
        }
        $data['questions'] = Question::query()->where('lecture_id', $data['lecture']->id)->where('user_id', authed()->id)
            ->orderByDesc('created_at')->paginate();

        return view('lecture.question', $data);
    }

    private function getLectureData($slug, $lecture_slug): array|RedirectResponse
    {
        $course = services()->courseService()->where('slug', $slug)->with(['lectures', 'users'])->firstOrFail();
        $lecture = $course->lectures->where('slug', $lecture_slug)->firstOrFail();
        if (! services()->courseService()->isRegistered($course)) {
            return redirect()->route('course.show', ['slug', $course->slug]);
        }

        return [
            'course' => $course,
            'lecture' => $lecture,
        ];
    }

}
