<?php

namespace App\Services;

use App\Enums\UserRole;
use App\Models\Lecture;
use Dotenv\Parser\Parser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LectureService extends ApiService
{

    protected $model = Lecture::class;

    protected function getOrderbyableFields(): array
    {
        return [
            'name', 'order', 'study_minutes', 'created_at',
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
            'course_id' => function($value) {
                return static function ($q) use ($value) {
                    $q->where('course_id', $value);
                };
            },
        ];
    }

    public function newQuery()
    {
        $query = parent::newQuery();
        $user = c('authed');
        if ($user->role === UserRole::TEACHER) {
            $query->whereHas('course', function ($q) use ($user) {
                $q->where('user_id', $user);
            });
        } else {
            $query->whereHas('course.users', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }

        return $query;
    }

    protected function fields(): array
    {
        return [
            'name', 'slug', 'document', 'video', 'order', 'course_id', 'created_at',
        ];
    }

    protected function boot(): void
    {
        parent::boot();

        $this->on('creating', function ($model) {
            $model->order = $model->where('course_id', $model->course_id)->count() + 1;
            $model->created_at = now();
        });

        $this->on('saving', function ($model) {
            $model->slug = Str::slug($model->name);
        });

    }

}
