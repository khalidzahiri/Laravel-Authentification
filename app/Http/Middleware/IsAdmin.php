<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifier si l'utilisateur connccter est un administarateur
        if (auth()->user()->admin === 1){
            //si oui, alors continuer jusqu'à la prochaine requete
            return $next($request);
        } else {
            //sinon, renvoyer une 403
            abort(403);
        }
    }
}
