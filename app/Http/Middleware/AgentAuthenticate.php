<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AgentAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('agent')->check()) {
            return $next($request);

        }
        return redirect()->route("agent.login");
    }
}
