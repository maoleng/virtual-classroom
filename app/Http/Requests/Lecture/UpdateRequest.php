<?php

namespace App\Http\Requests\Lecture;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'nullable',
            ],
            'document' => [
                'nullable',
            ],
            'video' => [
                'nullable',
            ],
            'order' => [
                'nullable',
            ],
            'study_minutes' => [
                'nullable',
            ],
            'course_id' => [
                'nullable',
            ],
            'created_at' => [
                'nullable',
            ],
        ];
    }
}
