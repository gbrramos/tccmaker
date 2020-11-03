<?php

namespace RW940cms\Http\Middleware;

use Closure;
use Response;
class SuperAdminMiddleware
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

return $next($request);
}
}
