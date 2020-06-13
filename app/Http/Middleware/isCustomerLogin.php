<?php

namespace App\Http\Middleware;

use Closure;

class isCustomerLogin
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
        if(!isset(session()->get('logininfo')[0])){
            flash('Sorry You Are Not Authorized!')->error();
            return redirect('/');
        }
        return $next($request);
    }
}
