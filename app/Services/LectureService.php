<?php

namespace App\Services;

use App\Models\Lecture;

class LectureService extends ApiService
{

    protected $model = Lecture::class;

    protected function getOrderbyableFields(): array
    {
        return [

        ];
    }

    protected function fields(): array
    {
        return [
            'name', 'document', 'video', 'order', 'course_id', 'created_at',
        ];
    }
}
