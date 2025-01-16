<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // İlk segmenti alıyoruz. Örneğin '/en/blog/...' gibi
        $locale = $request->segment(1);

        // Eğer segment 'en' ise dil İngilizce olsun
        if ($locale === 'en') {
            App::setLocale('en');
        } else {
            // Eğer başka bir dil yoksa varsayılan olarak Türkçe
            App::setLocale('tr');
        }

        return $next($request);
    }
}
