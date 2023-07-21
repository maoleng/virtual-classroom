<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{

    public function index(): View
    {
        $courses = services()->courseService()->withCount('lectures')->with('user')->orderByDesc('created_at')->paginate(6);

        return view('course.index', [
            'courses' => $courses,
        ]);
    }

    public function create()
    {
        return view('course.create');
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

    public function quiz($slug, $lecture_slug)
    {
        $data = $this->getLectureData($slug, $lecture_slug);
        if (! is_array($data)) {
            return $data;
        }

        return view('lecture.quiz', $data);
    }

    public function quizResult($slug, $lecture_slug)
    {
        $data = $this->getLectureData($slug, $lecture_slug);
        if (! is_array($data)) {
            return $data;
        }

        return view('lecture.quiz_result', $data);
    }

    public function assignment($slug, $lecture_slug)
    {
        $data = $this->getLectureData($slug, $lecture_slug);
        if (! is_array($data)) {
            return $data;
        }

        return view('lecture.assignment', $data);
    }

    public function assignmentSubmit($slug, $lecture_slug)
    {
        $data = $this->getLectureData($slug, $lecture_slug);
        if (! is_array($data)) {
            return $data;
        }

        return view('lecture.assignment_submit', $data);
    }

    public function teacherInteract($slug, $lecture_slug)
    {
        $data = $this->getLectureData($slug, $lecture_slug);
        if (! is_array($data)) {
            return $data;
        }

        return view('lecture.teacher_interact', $data);
    }

    private function getLectureData($slug, $lecture_slug): array|RedirectResponse
    {
        $course = services()->courseService()->where('slug', $slug)->with(['lectures', 'user', 'users'])->firstOrFail();
        $lecture = $course->lectures->where('slug', $lecture_slug)->firstOrFail();

        if (! services()->courseService()->isRegistered($course)) {
            return back();
        }

        $previous_lecture = $course->lectures->where('order', $lecture->order - 1)->first();
        $previous_lecture_url = $previous_lecture === null ? null :
            route('course.lecture', ['slug' => $slug, 'lecture_slug' => $previous_lecture->slug]);
        $next_lecture = $course->lectures->where('order', $lecture->order + 1)->first();
        $next_lecture_url = $next_lecture === null ? null :
            route('course.lecture', ['slug' => $slug, 'lecture_slug' => $next_lecture->slug]);

        $questions = Question::query()->where('lecture_id', $lecture->id)
            ->where(function ($q) {
                $q->orWhere('user_id', authed()->id)->orWhereNull('user_id');
            })->orderBy('created_at')->get();

        return [
            'course' => $course,
            'lecture' => $lecture,
            'questions' => $questions,
            'previous_lecture_url' => $previous_lecture_url,
            'next_lecture_url' => $next_lecture_url,
        ];
    }

}
