<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserToken;

class TokenController extends Controller
{
    public function createToken($user_id){
        $usertoken= UserToken::firstOrCreate(['user_id'=> $user_id]);

        $otp=rand(1111,9999);
        $expiry= date("Y-m-d H:i:s", strtotime("+30 minutes"));
        $usertoken->token=$otp;
        $usertoken->expiry=$expiry;
        $usertoken->save();
        return $otp;
    }
    
    public function verify(Request $request){
        $user=Auth::user();
        $usertoken= UserToken::where('user_id',$user->id)->first();
        $time= date("Y-m-d H:i:s", strtotime("now"));
        if( $time < $usertoken->expiry && $usertoken->token == $request->token){
            $user=User::where('id', $user->id)->first();
            $user->is_verified=date("Y-m-d H:i:s", strtotime("now"));;
            $user->save();
            
            return redirect('/coordinator/dashboard')->with(['message'=>'Otp Verified Successfully']);
        }
        else{
            return back()->with(['error'=>'Invalid Otp']);
        }
    }
    
}
