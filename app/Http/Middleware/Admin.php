<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;



class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna telah masuk dan memiliki peran admin
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return $next($request);
        }

        // Jika tidak, arahkan pengguna ke halaman lain atau berikan respon yang sesuai
        return redirect('/')->with('error', 'Unauthorized access');
    }

    public function updateStatus(Request $request, $id)
    {
        // Pastikan bahwa pengguna yang mencoba mengakses fitur ini adalah admin
        if (auth()->user()->usertype !== 'admin') {
            abort(403, 'Anda tidak diizinkan mengakses halaman ini.');
        }

        // Logika perubahan status seperti yang ditunjukkan di atas
    }
}
