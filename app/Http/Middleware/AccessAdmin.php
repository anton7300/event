<?php

namespace App\Http\Middleware;

use Closure;

class AccessAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->permission == 0) {
            return $next($request);
        }

        return redirect('index');
    }
}
