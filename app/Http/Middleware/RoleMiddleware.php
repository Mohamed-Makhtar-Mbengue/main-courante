<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
        {
            $user = auth()->user();

            if (!$user || !$user->hasRole($roles)) {
                abort(403, 'Accès refusé');
            }

            return $next($request);
        }

}
