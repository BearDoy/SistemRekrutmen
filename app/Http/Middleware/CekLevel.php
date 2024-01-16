<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $levels)
    {
        if ($request->user()->level == 'admin' || 'user') {
            return $next($request);
        }
        return redirect('/login')->with('gagal', 'Username / Password Salah!');
    }
}
