<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // تحقق مما إذا كان المستخدم مسجلاً للدخول ولديه دور "admin"
        if (auth()->check() && auth()->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        return $next($request);
    }
}
