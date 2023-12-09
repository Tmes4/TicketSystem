<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Componen   t\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Controleer of de gebruiker is ingelogd
        if (Auth::check()) {
            // Controleer of de gebruiker een admin is
            if (Auth::user()->isAdmin()) {
                // De gebruiker is een admin, laat hem door
                return $next($request);
            }
        }

        // Redirect naar de homepagina of een andere pagina indien nodig
        return redirect('/')->with('error', 'Unauthorized. You must be an admin.');
    }
}
