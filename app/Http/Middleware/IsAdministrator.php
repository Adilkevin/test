<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class IsAdministrator
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
        if (!$user->hasRole('admin')) {
            return redirect('admin/login');
        }

        return $next($request);
    }
}
