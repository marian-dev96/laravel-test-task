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
        if (auth()->check()) {
            $lang = \Cache::remember('lang_' . auth()->user()->id, 3600, function () {
                return auth()->user()->language->slug ?? (\App\Models\Language::default()->first()->slug ?? \App::getLocale());
            });

            \App::setLocale($lang);
        }


        return $next($request);
    }
}
