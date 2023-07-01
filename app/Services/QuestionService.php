<?php

namespace App\Services;

use App\Models\Question;

class QuestionService extends ApiService
{

    protected $model = Question::class;

    protected function getOrderbyableFields(): array
    {
        return [

        ];
    }

    protected function fields(): array
    {
        return [
            'content', 'text_answer', 'audio_answer', 'video_answer', 'lecture_id', 'user_id', 'created_at',
        ];
    }
}
