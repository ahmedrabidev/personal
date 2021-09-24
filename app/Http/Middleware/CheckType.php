<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckType
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
        // Logic Code
        $type = Auth::user()->type;
        if($type != 'admin'){
            return redirect()->route('notallowed');
        }
        return $next($request);
    }
}
