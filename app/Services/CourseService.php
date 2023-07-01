<?php

namespace App\Services;

use App\Models\Course;

class CourseService extends ApiService
{

    protected $model = Course::class;

    protected function getOrderbyableFields(): array
    {
        return [

        ];
    }

    protected function fields(): array
    {
        return [
            'name', 'slug', 'thumbnail', 'description', 'preview_video', 'duration', 'price', 'user_id', 'created_at',
        ];
    }
}
