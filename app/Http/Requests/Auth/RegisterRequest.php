<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;
use App\Models\User;

class RegisterRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
                function ($attribute, $value, $fail) {
                    $check = User::query()->where('email', $value)->first();
                    if ($check !== null) {
                        return $fail(trans('messages.email_exist'));
                    }
                }
            ],
            'role' => [
                'required',
                'in:teacher,student',
            ],
            'password' => [
                'required',
            ],
        ];
    }

}
