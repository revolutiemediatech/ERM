<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class LoginApoteker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('idRole') != '4'){
            return redirect()->to('/login')->with('gagal', 'Mohon Maaf Fitur ini hanya untuk Apoteker');
        }
        return $next($request);
    }
}
