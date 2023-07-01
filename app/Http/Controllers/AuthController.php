<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Lib\JWT\UserToken;
use App\Models\User;

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

    public function register(RegisterRequest $request): array
    {
        $data = $request->validated();
        $user = User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => UserRole::getValue(strtoupper($data['role'])),
            'avatar' => 'https://i.pinimg.com/736x/b7/03/e8/b703e86875fc4642fb4a40a30df868a4.jpg',
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'token' => '',
            'created_at' => now(),
        ]);

        return [
            'status' => true,
            'message' => trans('messages.register_successfully'),
            'data' => [
                'id' => $user->id,
                'avatar' => $user->avatar,
                'name' => $user->name,
                'role' => $user->role,
                'email' => $user->email,
            ],
        ];
    }

    protected function getService()
    {
    }

}
