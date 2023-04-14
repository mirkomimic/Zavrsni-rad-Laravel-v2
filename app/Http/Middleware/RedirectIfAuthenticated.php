<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        // ako je korisnik ulogovan, ne dozvoljava prilaz login-u i preusmerava

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            switch ($guard) {
                case 'restaurant':
                    if (Auth::guard($guard)->check()) {
                        return redirect()->route('restaurant.dashboard');
                    }
                    break;

                default:
                    if (Auth::guard($guard)->check()) {
                        return redirect(RouteServiceProvider::HOME);
                    }
                    break;
            }
        }

        return $next($request);
    }
}
