<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }

    public function unauthenticated($request, AuthenticationException $exception)
    {
        $guard = array_get($exception->guards(), 0);

        switch ($guard) {
            case 'admin':
                $login = 'admin-login';
                break;
            default:
                $login = 'login';
                break;
        }

        return redirect()->guest(route($login));
    }
}
