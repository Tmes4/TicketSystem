<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // Add your authorization check before processing the original middleware

        if (auth()->check() && auth()->user()->isLoggedInUser()) {
            return parent::handle($request, $next, $guards);
        }

        return redirect()->route('login');
    }
}
