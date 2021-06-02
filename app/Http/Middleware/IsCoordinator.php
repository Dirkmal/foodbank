<?php

namespace App\Http\Middleware;

use App\Models\Coordinator;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IsCoordinator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user=Auth::user();
        if ($user) {
            $coordinator=Coordinator::where('coordinator_id', $user->id)->first();
            if ($coordinator) {
                return $next($request);
            }
        }
         return redirect('/coordinator/sign-in');
    }
}
