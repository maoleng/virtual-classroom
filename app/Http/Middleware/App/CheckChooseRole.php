<?php

namespace App\Http\Middleware\App;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CheckChooseRole
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

        if (authed() === null || authed()->role !== null ||
            in_array($request->route()->getName(), ['choose_role', 'process_choose_role'])
        ) {
            return $next($request);
        }

        return redirect()->route('choose_role');
    }
}
