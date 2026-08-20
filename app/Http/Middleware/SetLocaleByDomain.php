<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocaleByDomain
{
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();

        // Default locale map by domain
          $domainLangMap = [
            // 'cf88.news' => 'vn',
            'cf88.news' => 'kh',
            'cf88.me' => 'kh',
            'cf88.info' => 'kh',
            'daga24.news' => 'vn',
            'daga24.live' => 'vn',
            'daga88.news' => 'vn',
        ];

        // Check if user manually selected a language (stored in session)
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            // Otherwise, use the domain-based locale
            $locale = $domainLangMap[$host] ?? config('app.locale');
            Session::put('locale', $locale); // store it for later
        }

        App::setLocale($locale);

        return $next($request);
    }
}
