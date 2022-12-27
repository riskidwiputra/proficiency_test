<?php

namespace App\Http\Middleware;

use App\Models\merchants;
use Closure;
use Exception;
use Illuminate\Http\Request;

class CheckKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has('key')) {
            return response()->json([
                'status'    => false,
                'message'    => 'Unauthorized Access',
            ],400);
        }
        $key = $request->input('key');
        
        if(!merchants::where('key',$key)->first()){
            return response()->json([
                'status'    => false,
                'message'    => 'Unauthorized Access',
            ],400);
        }

        return $next($request);
    }
}
