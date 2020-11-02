<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $lang = \Cache::remember('lang', 3600, function () {
            return auth()->user()->language->slug ?? (\App\Models\Language::default()->first()->slug ?? \App::getLocale());
        });

        \App::setLocale($lang);

        return $next($request);
    }
}
