<?php

namespace App\Http\Middleware;

use Closure;

class checkToken
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
        if($request->header('Authorization') == '') {
            return response()->json([
                'message' => 'Access Denied'
            ], 301);
        }else {
            if($request->header('Authorization') == $request->user()->token) {
                return $next($request);
            }else {
                return response()->json([
                    'message' => 'Access Denied'
                ], 301);
            }
        }
    }
}
