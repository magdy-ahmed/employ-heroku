<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$permission = null)
    {
        if($permission == null){
            abort(404);
        }
        if($request->user()==null) {

            abort(404);
        }
        if(!$request->user()->can($permission)) {

            abort(404);
        }
        return $next($request);

    }
}
