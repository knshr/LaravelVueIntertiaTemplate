<?php

namespace App\Http\Middleware;

use App\Enum\UserType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $type = Auth::user()->type;
        if (Auth::user() && $type == UserType::ADMIN) {
            return $next($request);
        }
        
        return redirect(null, 404);
    }
}
