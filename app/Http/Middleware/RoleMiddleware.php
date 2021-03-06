<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next, $role=null, $permission = null)
        {
            if($role == null && $permission ==null ){
                abort(404);
            }elseif(!$role == null){
                if($request->user()==null) {

                    abort(404);
               }
                if(!$request->user()->hasRole($role)) {
                     abort(404);
                }

                if($permission !== null && !$request->user()->can($permission)) {

                      abort(404);
                }

            }


            return $next($request);

        }

}
