<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class LoginParamedis
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
        if(session()->get('idRole') != '8'){
            return redirect()->to('/login')->with('gagal', 'Mohon Maaf Fitur ini hanya untuk Paramedis');
        }
        return $next($request);
    }
}
