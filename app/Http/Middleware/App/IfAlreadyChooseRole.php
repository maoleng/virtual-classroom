<?php

namespace App\Http\Middleware\App;

use Closure;
use Illuminate\Http\Request;

class IfAlreadyChooseRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (isset(authed()->role)) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
