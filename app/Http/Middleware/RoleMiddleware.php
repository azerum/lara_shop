<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $roleSlug
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $roleSlug)
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        if (!$user->hasRole($roleSlug)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
