<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Coordinator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        $user= User::where('email', $request->email)->first();
            if(!$user){
                return back()->with([
                    'error' => 'The provided credentials do not match our records.',
                ]);
            }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user=Auth::user();
            $is_coordinator=Coordinator::where('user_id', $user->id);
                if($user->is_admin){
                    return redirect('admin/dashboard');
                }
                if($is_coordinator){
                    return redirect('coordinator/dashboard');  
                }
            return redirect()->intended('dashboard');
        }
        return back()->with([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
}
