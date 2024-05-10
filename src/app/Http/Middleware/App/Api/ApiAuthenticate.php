<?php

namespace App\Http\Middleware\App\Api;

use App\Models\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthenticate extends Middleware
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
    public function handle($request, Closure $next, ...$guards)
    {
        if ($authorization = $request->headers->get('Authorization')) {
            preg_match("/bearer ([^\ ]*)/i", $authorization, $match);
            $token = $match[1] ?? null;
        } else {
            $token = $request->query->get('token');
        }

        $user = User::query()->where('token', $token)->first();
        if (! $user instanceof User) {
            return $this->errorJson(Response::HTTP_UNAUTHORIZED);
        }

        app()->singleton('authed', function () use ($user) {
            return $user;
        });

        return $next($request);
    }

    protected function errorJson($statusCode = Response::HTTP_BAD_REQUEST): Response
    {
        return new JsonResponse([
            'status' => false,
            'message' => 'Ê, mày là ai vậy ?',
        ], $statusCode);
    }
}
