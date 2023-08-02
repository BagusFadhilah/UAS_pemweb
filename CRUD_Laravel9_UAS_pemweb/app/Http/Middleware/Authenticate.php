<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (! $this->authenticate($request, $guards)) {
            return redirect()->route('login'); // Redirect ke halaman login jika tidak terotentikasi
        }

        return $next($request);
    }
}
