<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            return match ($role) {
                'admin'   => redirect('admin/dashboard'),
                'petugas' => redirect('petugas/dashboard'),
                default   => redirect('user/dashboard'),
            };
        }

        return $next($request);
    }
}
