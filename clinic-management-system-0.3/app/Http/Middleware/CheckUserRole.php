<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, $roleName): Response
    {
        $user_id = auth()->id();
        $user = User::findOrFail($user_id);
        $role = Role::where('name',$roleName)->firstOrFail();
        if ($user && $user->role_id == $role->id) {
            return $next($request);
        }
        if ($user) {
            return redirect()->route('unauthorized')
                ->with('error', 'You are not authorized to access this page.')
                ->with('redirectRoute', 'admin.dashboard')
                ->with('countdown', 5);
        }
    }
}
