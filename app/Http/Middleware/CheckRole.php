<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        $userRole = strtolower(auth()->user()->role); // Ubah peran pengguna menjadi huruf kecil

        if ($role === 'admin' && $userRole !== 'admin') {
            return redirect('/home'); // Gantilah '/home' dengan rute yang sesuai
        }

        if ($role === 'user' && $userRole !== 'user') {
            return redirect('/home'); // Gantilah '/home' dengan rute yang sesuai
        }

        return $next($request);
    }


}
