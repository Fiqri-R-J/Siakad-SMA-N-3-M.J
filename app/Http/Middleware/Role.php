<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check()) {
            if (auth()->user()->akses == 0) {
                $user = 'admin';
            } else  if (auth()->user()->akses == 1) {
                $user = 'guru';
            } else  if (auth()->user()->akses == 2) {
                $user = 'siswa';
            }

            if ($user == $role) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
