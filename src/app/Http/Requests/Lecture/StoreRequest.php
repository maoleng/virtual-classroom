<?php

namespace App\Http\Requests\Lecture;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'document' => [
                'required',
            ],
            'video' => [
                'required',
            ],
            'study_minutes' => [
                'required',
            ],
            'course_id' => [
                'required',
            ],
        ];
    }
}
