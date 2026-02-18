<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user) {
            abort(403, 'Accès refusé');
        }

        // Vérifie si l'utilisateur possède AU MOINS un des rôles demandés
        if (!$user->roles()->whereIn('name', $roles)->exists()) {
            abort(403, 'Accès refusé');
        }

        return $next($request);
    }
}
