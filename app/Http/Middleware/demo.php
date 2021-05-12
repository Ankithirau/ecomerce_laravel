<?php

namespace App\Http\Middleware;

use Closure;

class demo
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
        // Pre-Middleware Action
        if ($request->input('age') <= 200) {
            
            return response()->json(['code'=>'401','status'=>'User not found'])
        }
        $response = $next($request);

        // Post-Middleware Action

        return $response;
    }
}
