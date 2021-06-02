<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserToken;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Validator;



class TokenController extends Controller
{
    public function createToken(){
        $user=Auth::user();
        $user_id=$user->id;

        $usertoken= UserToken::firstOrCreate(['user_id'=> $user_id]);

        $otp=rand(1111,9999);
        $expiry= date("Y-m-d H:i:s", strtotime("+30 minutes"));
        $usertoken->token=$otp;
        $usertoken->expiry=$expiry;
        $usertoken->save();

        $user=User::where('id', $user_id)->first();

        $user->notify(new Otp($otp));
        return response()->json(['error'=>true, 'message'=>'Otp Sent']);
        
    }

    public function forgotpassword($email){
        $user=User::where('email', $email)->first();
        $user_id=$user->id;

        $usertoken= UserToken::firstOrCreate(['user_id'=> $user_id]);

        $otp=rand(1111,9999);
        $expiry= date("Y-m-d H:i:s", strtotime("+30 minutes"));
        $usertoken->token=$otp;
        $usertoken->expiry=$expiry;
        $usertoken->save();

        $user=User::where('id', $user_id)->first();

        $user->notify(new Otp($otp));
        return response()->json(['error'=>true, 'message'=>'Otp Sent']);
        
    }
    
    public function verify($otp){
        $user=Auth::user();
        $usertoken= UserToken::where('user_id',$user->id)->first();
        $time= date("Y-m-d H:i:s", strtotime("now"));
        if( $time < $usertoken->expiry && $usertoken->token == $otp){
            $user=User::where('id', $user->id)->first();
            $user->is_verified=date("Y-m-d H:i:s", strtotime("now"));;
            $user->save();
            return response()->json(['error'=>false, 'message'=>'Otp Verified Succesfully']);
            
        }
        else{
            return response()->json(['error'=>true, 'message'=>'Invalid Otp']);
        }
    }


    public function resetPassword(Request $request){
        
        $validator=Validator::make($request->all(), [
            'email'=> 'required|email',
            'otp' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

       $user=User::where('email',$request->email)->first();
       if ($validator->fails()) {
          return response()->json([
              'error' => true,
              'msg' => $validator->errors()
          ]);
      }

        $usertoken= UserToken::where('user_id',$user->id)->first();
        $time= date("Y-m-d H:i:s", strtotime("now"));
        if( $time < $usertoken->expiry && $usertoken->token == $request->otp){
            $user=User::where('id', $user->id)->first();

            $user->password=bcrypt($request->password);
            $user->save();
            return response()->json(['error'=>false, 'message'=>'Password Changed Successfully']);
            
        }
        else{
            return response()->json(['error'=>true, 'message'=>'Invalid Otp']);
        }
    }
}
