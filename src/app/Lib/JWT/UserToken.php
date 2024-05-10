<?php

namespace App\Lib\JWT;

trait UserToken
{
    public function generateToken($user)
    {
        return c(JWT::class)->encode([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'avatar' => $user->avatar,
        ]);
    }

    public function updateToken($user): string
    {
        $token = $this->generateToken($user);
        $user->token = $token;
        $user->save();

        return $token;
    }
}
