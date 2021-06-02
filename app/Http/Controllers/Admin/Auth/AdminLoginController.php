<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        $user= User::where('email', $request->email)->where('is_admin', 1)->first();
       
            if(!$user){
                return back()->with([
                    'error' => 'The provided credentials do not match our records.',
                ]);
            }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
             return redirect('admin/dashboard');
        }
        return back()->with([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
}
