<?php

namespace App\Http\Middleware;

use Closure;

class perm_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(admin()->user()->is_admin == 1){
            return $next($request);
        }else{
            return redirect(aurl('home'));
        }
    }
}
