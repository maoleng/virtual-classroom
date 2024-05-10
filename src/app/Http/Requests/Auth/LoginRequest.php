<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;
use App\Models\User;

class LoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required',
            ],
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    $check = $this->auth($this->get('email'), $value);
                    if ($check === null) {
                        return $fail(trans('messages.wrong_email_or_password'));
                    }
                    $this->merge(['user' => $check]);
                }
            ],
        ];
    }

    private function auth($email, $password): User|null
    {
        $user = services()->userService()->where('email', $email)->first();
        if (empty($user)) {
            return null;
        }
        if (! $user->verify($password)) {
            return null;
        }

        return $user;
    }
}
