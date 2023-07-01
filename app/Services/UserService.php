<?php

namespace App\Services;

use App\Enums\UserRole;
use App\Models\User;

class UserService extends ApiService
{

    protected $model = User::class;

    protected function getOrderbyableFields(): array
    {
        return [

        ];
    }

    protected function mapFilters(): array
    {
        return [
            'name' => function ($value) {
                return (static function ($q) use ($value) {
                    $q->where('name', 'LIKE', "%$value%");
                });
            },
            'role' => function ($value) {
                return (static function ($q) use ($value) {
                    if ($value === 'admin') {
                        $q->where('role', UserRole::ADMIN);
                    }
                    if ($value === 'student') {
                        $q->where('role', UserRole::STUDENT);
                    }
                    if ($value === 'teacher') {
                        $q->where('role', UserRole::TEACHER);
                    }
                });
            }
        ];
    }

    protected function fields(): array
    {
        return [
            'email', 'name', 'avatar', 'password', 'role', 'created_at',
        ];
    }

    protected function boot()
    {
        parent::boot();

        $this->on('creating', function ($model) {
            $model->name = 'on creating...';
        });
    }
}
