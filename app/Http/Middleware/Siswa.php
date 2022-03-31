<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Siswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 
     * 
     * home dibawah karena kalau yg masuk bukan siswa maka dia adadidalam menu utama
     */

    public function handle($request, Closure $next)
    {
        if (Auth()->check() && $request->user()->akses == '2') {
            return $next($request);
        }

        return redirect('/');
    }
}
