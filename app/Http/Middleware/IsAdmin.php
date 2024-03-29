<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IsAdmin
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
            $is_admin=User::where('id', $user->id)->value('is_admin');
            if ($is_admin) {
                return $next($request);
            }
        }
         return redirect('/admin/sign-in');
    }
    
}
