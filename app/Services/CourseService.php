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

    protected function mapFilters(): array
    {
        return [
            'name' => function ($value) {
                return static function ($q) use ($value) {
                    $q->where('name', 'LIKE', "%$value%");
                };
            },
            'user_id' => function($value) {
                return static function ($q) use ($value) {
                    $q->where('user_id', $value);
                };
            },
            'is_verify' => function ($value) {
                return static function ($q) use ($value) {
                    $q->where('is_verify', $value);
                };
            },
        ];
    }

    protected function fields(): array
    {
        return [
            'name', 'slug', 'thumbnail', 'description', 'preview_video', 'duration', 'price', 'user_id', 'is_verify',
            'created_at',
        ];
    }

    protected function boot()
    {
        parent::boot();

        $this->on('creating', function ($model) {
            $model->user_id = c('authed')->id;
            $model->created_at = now();
        });

        $this->on('updating', function ($model) {
            if ($model->user_id !== c('authed')->id) {
                throw new \RuntimeException(trans('messages.not_your_course'));
            }
        });

        $this->on('deleting', function ($model) {
            if ($model->user_id !== c('authed')->id) {
                throw new \RuntimeException(trans('messages.not_your_course'));
            }
        });


    }

}
