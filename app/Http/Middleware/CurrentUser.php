<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CurrentUser
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user()->load('cart');
            $cart = $user ? $user->cart : collect([]);
        }
        else {
            $user = null;
            $cart = cookieCart($request);
        }

        view()->share('user', $user);
        view()->share('cart', $cart);

        return $next($request);
    }
}
