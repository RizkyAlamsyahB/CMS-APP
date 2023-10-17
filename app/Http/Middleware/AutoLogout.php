<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    protected $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna sudah login dan rolenya adalah 'user' atau 'admin'
        if (Auth::check() && in_array(Auth::user()->role, ['user', 'admin'])) {
            $lastActivity = $this->session->get('lastActivity');

            // Periksa apakah ada aktivitas dalam 5 menit terakhir
            if (time() - $lastActivity > 900) {
                Auth::logout();
                $this->session->flush();
                return redirect('/login')->with('timeout', 'Anda telah logout karena tidak ada aktivitas selama 5 menit.');
            }
        }

        // Perbarui waktu aktivitas terakhir
        $this->session->put('lastActivity', time());

        return $next($request);
    }
}
