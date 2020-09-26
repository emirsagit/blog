<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhetherHavePermissionToSeeAdminPanel
{
    protected $roles = ['admin', 'superAdmin', 'author'];
    public function handle(Request $request, Closure $next)
    {
        Auth::user() ? $user=Auth::user() : abort(403); 
        $user->role ? $userRole=collect($user->role->name) : abort(403); 
        foreach ($this->roles as $role) {
            if ($userRole->contains($role)) {
                return $next($request);
            }
        }
        abort(403);
    }
}
