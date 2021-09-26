<?php

namespace App\Http\Middleware\Operator;

use Closure;
use Illuminate\Http\Request;

class EnsureHasAccessToHotel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        abort_unless($request->user()->hasPermissionTo('hotel.'.$request->hotel->id), 401, "Do not access to this hotel");
        return $next($request);
    }
}
