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
//var_dump($request->user()->id);
        $user = $request->user();
        var_dump($user->id);
//        $user->givePermissionTo('edit articles');
//        $user->assignRole('administrator');
//        var_dump($user->);

//        $role  =  Role::create(['name'  =>  'writer']);
//        $permission  =  Permission::create(['name' => 'edit articles']);
        if (!$user->hasRole('admin')) {
            return redirect('admin/login');
        }

        return $next($request);
    }
}
