<?php


namespace App\Http\Middleware;


use Closure;

class ApiCheckAjaxMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */

    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {
    if ($request->ajax() )
    {
        return $next($request);

    }
    }
}
