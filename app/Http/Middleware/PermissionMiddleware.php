<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $permissionSlug
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $permissionSlug)
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        if (!$user->hasPermission($permissionSlug)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
