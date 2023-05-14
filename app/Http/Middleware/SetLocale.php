<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    private $locales = ['ar', 'en'];

    public function handle(Request $request, Closure $next): Response
    {        
        $locale = $request->header('Accept-Language');
        
        if(array_search($locale, $this->locales) === false) {
            $locale = 'ar';
        }

        app()->setLocale($locale);
        return $next($request);
    }
}
