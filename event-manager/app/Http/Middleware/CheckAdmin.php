<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * If a user is an admin forward to the next request
     * if not, let the user know they're not authorized to access
     * the page they are trying to request
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->isAdmin == true) {
            return $next($request);
        } else {
            return redirect()->route('notAuthorized');
        }
    }
}
