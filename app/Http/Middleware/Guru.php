<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Guru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 
     * 
     * home dibawah karena kalau yg masuk bukan guru maka dia adadidalam menu utama
     */

    public function handle($request, Closure $next)
    {
        if (Auth()->check() && $request->user()->akses == '1') {
            return $next($request);
        }

        return redirect('/');
    }
}
