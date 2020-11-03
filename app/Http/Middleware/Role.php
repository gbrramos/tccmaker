<?php

namespace RW940cms\Http\Middleware;

use Closure;

class Role
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

          if ($request->user() != "admin") {
            //return redirect()->route('admin.index');

            
        }

        return $next($request);
    }
}
