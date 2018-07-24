<?php

namespace App\Http\Middleware;

use Closure;

class isSuperadministrator
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
        $user = $request->user();
//        if (!$user->hasRole('superadmin')) {
//            return redirect('admin/home');
//        }
        return $next($request);
    }
}
