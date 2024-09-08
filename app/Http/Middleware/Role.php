<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return to_route('/')->withErrors(['auth' => 'Invalid Auth']);
        }

        $user = Auth::user();

        /**
         * Check if the role is not in the array. If not, return to the login page.
         */
        if (!in_array($user->role, $roles)) {
            return to_route('login')->withErrors(['auth' => 'Current role is not allowed.']);
        }

        return $next($request);
    }
}
