<?php

namespace App\Http\Middleware\App;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle(Request $request, Closure $next)
    {
        if (c('authed')->role !== UserRole::ADMIN) {
            return new JsonResponse([
                'status' => false,
                'message' => trans('messages.you_are_not_admin'),
            ], Response::HTTP_BAD_REQUEST);
        }

        return $next($request);
    }
}