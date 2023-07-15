<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'nullable',
            ],
            'slug' => [
                'nullable',
            ],
            'thumbnail' => [
                'nullable',
            ],
            'title' => [
                'nullable',
            ],
            'description' => [
                'nullable',
            ],
            'preview_video' => [
                'nullable',
            ],
            'duration' => [
                'nullable',
            ],
            'price' => [
                'nullable',
            ],
        ];
    }
}
