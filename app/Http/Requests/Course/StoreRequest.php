<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'slug' => [
                'required',
            ],
            'thumbnail' => [
                'required',
            ],
            'title' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'preview_video' => [
                'required',
            ],
            'duration' => [
                'required',
            ],
            'price' => [
                'required',
            ],
        ];
    }
}
