<?php

namespace App\Http\Controllers;

use App\Lib\JWT\JWT;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $g_user = Socialite::driver('google')->stateless()->user();
        $user = User::query()->where('email', $g_user->email)->first();
        if (empty($user)) {
            $user = User::query()->create([
                'email' => $g_user->email,
                'name' => $g_user->name,
                'avatar' => $g_user->avatar,
                'created_at' => now(),
            ]);
        }
        session()->put('authed', $user);

        return redirect()->route('index');
    }

    public function logout(): RedirectResponse
    {
        session()->forget('token');
        session()->flush();
        session()->save();

        return redirect()->route('index');
    }

}
