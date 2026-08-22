<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminDomain
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // $allowedDomain = 'admin.cf88.me';
        // if ($request->getHost() !== $allowedDomain) {
            // Redirect to homepage if not allowed
            // return redirect('/');
        // }

        return $next($request);
    }
}
