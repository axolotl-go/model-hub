<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Router;

class RoleValid
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // redireccionar a home en caso de que rol sea usuario
        if (!in_array($user->role, $roles)) {
            return redirect('/');
        };

        return $next($request);
    }
}