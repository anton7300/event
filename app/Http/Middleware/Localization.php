<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Session;
use Config;

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
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $locale = User::where('id', $user_id)->select('locale')->first()->toArray();

            app()->setLocale($locale['locale']);
        } else {
            $locale=Session::get('locale', Config::get('app.locale'));

            app()->setLocale($locale);
        }

        return $next($request);
    }
}
