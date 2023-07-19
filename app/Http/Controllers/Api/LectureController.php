<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Lecture\StoreRequest;
use App\Http\Requests\Lecture\UpdateRequest;
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

    public function ask(Request $request)
    {
        $data = $request->all();
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
            'authorName' => $answer->authorName,
            'authorAvatar' => $answer->authorAvatar,
            'content' => $answer->content,
        ];
    }

}
