<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class superAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna sudah diautentikasi
        if (auth()->check()) {
            // Memeriksa apakah pengguna adalah super admin
            if (auth()->user()->isSuperAdmin()) {
                return $next($request);
            }
        }
        
        // Redirect atau abort jika pengguna tidak diotorisasi
        // return redirect('dashboardAdmin'); // Ganti dengan rute yang sesuai jika perlu
        abort(403);
    }
}
