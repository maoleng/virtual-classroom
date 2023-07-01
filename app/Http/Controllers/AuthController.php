<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Lib\JWT\UserToken;

class AuthController extends ApiController
{

    use UserToken;

    public function login(LoginRequest $request): array
    {
        $user = $request->all()['user'];

        return [
            'status' => true,
            'data' => [
                'id' => $user->id,
                'avatar' => $user->avatar,
                'name' => $user->name,
                'role' => $user->role,
                'email' => $user->email,
                'token' => $this->updateToken($user),
            ],
        ];
    }

    protected function getService()
    {
    }

}
