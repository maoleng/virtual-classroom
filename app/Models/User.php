<?php

namespace App\Models;

class User extends Base
{

    protected $fillable = [
        'email', 'name', 'avatar', 'password', 'role', 'token', 'created_at',
    ];

    protected $hidden = [
        'password', 'token',
    ];

    protected function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT);
    }

    public function verify($password): bool
    {
        return password_verify($password, $this->password);
    }

}
