<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employee = Auth::user();

        if (!$employee) {
            return response()->json(['message' => 'Usuario no autentificado'], 401);
        }

        switch ($employee->user_type) {
            case 'gerente':
            case 'RRHH':
            case 'CEO':
                return $next($request);
                break;
            default:
                return response()->json(['message' => 'No tienes permisos para realizar esta acción'], 403);
                break;
        }

        return $next($request);
    }
}
