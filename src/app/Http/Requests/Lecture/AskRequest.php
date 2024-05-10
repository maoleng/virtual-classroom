<?php

namespace App\Http\Requests\Lecture;

use App\Http\Requests\BaseRequest;
use App\Models\Lecture;

class AskRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'content' => [
                'required',
            ],
            'lecture_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $course = Lecture::query()->find($value)->course;
                    if (! services()->courseService()->isRegistered($course)) {
                        return $fail('Course not registered');
                    }
                }
            ],
        ];
    }
}
