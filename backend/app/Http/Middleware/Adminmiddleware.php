<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('sancatum')->user();
        if ($user && $user->maquyen === 0) {
            return $next($request);
        } else {
            return response()->json(['status' => 0, 'message' => 'Không đủ quyền truy cập'], 401);
        }
    }
}
