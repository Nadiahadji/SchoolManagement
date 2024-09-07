<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
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
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            $user = Auth::user();

            // Si le statut de l'utilisateur est 0, redirigez-le vers la page de connexion
            if ($user->is_active != 1) {
                Auth::logout(); // Déconnecte l'utilisateur
                return redirect('/login')->with('error', 'Votre compte a été désactivé.');
            }
            
        }

        return $next($request);
    }
}
