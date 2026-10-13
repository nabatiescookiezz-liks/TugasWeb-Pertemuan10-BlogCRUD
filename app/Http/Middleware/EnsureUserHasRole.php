<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            abort(401);
        }

        if (!$user->hasRole(...$roles)) {
            abort(403, 'Kamu tidak memiliki izin untuk membuka halaman ini.');
        }

        return $next($request);
    }
}
