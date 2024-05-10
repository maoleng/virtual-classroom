<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Lecture\AskRequest;
use App\Http\Requests\Lecture\StoreRequest;
use App\Http\Requests\Lecture\UpdateRequest;
use App\Models\Course;
use App\Models\Question;
use App\Services\LectureService;
use Illuminate\Http\Request;

class LectureController extends ApiController
{

    public function getService()
    {
        return c(LectureService::class);
    }

    public function getStoreRequest()
    {
        return c(StoreRequest::class);
    }

    public function getUpdateRequest()
    {
        return c(UpdateRequest::class);
    }

    public function create()
    {
        $course = Course::query()->orderByDesc('created_at')->first();

        return view('lecture.create', [
            'course' => $course,
        ]);
    }

    public function transformVideo()
    {
        return view('lecture.transform_video');
    }

    public function previewTransformVideo()
    {
        $course = Course::query()->orderByDesc('created_at')->first();

        return view('lecture.preview_transform_video', [
            'course' => $course,
        ]);
    }

    public function ask(AskRequest $request): array
    {
        $data = $request->validated();
        Question::query()->create([
            'content' => $data['content'],
            'lecture_id' => $data['lecture_id'],
            'user_id' => authed()->id,
            'created_at' => now(),
        ]);
        $answer = Question::query()->create([
            'content' => services()->questionService()->generateText($data['content']),
            'lecture_id' => $data['lecture_id'],
            'created_at' => now(),
        ]);

        return [
            'status' => true,
            'data' => [
                'authorName' => $answer->authorName,
                'authorAvatar' => $answer->authorAvatar,
                'content' => $answer->content,
            ],
        ];
    }

}
