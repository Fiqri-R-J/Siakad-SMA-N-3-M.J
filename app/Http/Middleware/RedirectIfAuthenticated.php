<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth()->check()) {
            if (auth()->user()->akses == 0) {
                return redirect('admin/beranda');
            } else  if (auth()->user()->akses == 1) {
                return redirect('guru/beranda');
            } else  if (auth()->user()->akses == 2) {
                return redirect('siswa/beranda');
            }
        }

        return $next($request);
    }
}
