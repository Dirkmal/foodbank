<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coordinator;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user= Auth::user();
                $is_coordinator=Coordinator::where('coordinator_id', $user->id)->first();
                if($user->is_admin){
                    return redirect(RouteServiceProvider::ADMIN_H0ME);
                }
                if($is_coordinator){
                    return redirect(RouteServiceProvider::COORDINATOR_H0ME);
                }
                return redirect(RouteServiceProvider::HOME);
            }
        }
        return $next($request);
    }
}
