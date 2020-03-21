<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class Localization
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
        if (auth()->user()) {
            $user_id = auth()->user()->id;
            $locale = User::where('id', $user_id)->select('locale')->first()->toArray();

            if ( !empty($locale['locale']) )
                app()->setLocale($locale['locale']);
        }

        return $next($request);
    }
}
