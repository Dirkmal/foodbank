<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\LoanWallet;
use Illuminate\Http\Request;

use App\Models\UserDetail;
use App\Models\UserToken;
use App\Models\Wallet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserWelcome;
use App\Models\User;
use App\Http\Controllers\User\TokenController;
use Illuminate\Support\Facades\Hash;




class AuthController extends Controller
{
     /** * Registration*/
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ]);
        }
        $user = User::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'is_admin' =>0,   
        ]);
        $this->UserCreate($user->id, $request->firstname, $request->lastname);
        if($request->institution_id){
            $this->CoordinatorCreate($user->id, 1);
        }

        $tokenize=new TokenController;response()->json(['error'=>false, 'message'=>'Otp Generated Successfully']);
        $otp=$tokenize->createToken($user->id);

        $user->notify(new UserWelcome($request->firstname, $otp));

        $token = $user->createToken('Foodbank')->accessToken;
        return response()->json(['token' => $token], 200);
    }
    /** * Login */
    public function login(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ]);
        }
       if (Auth::attempt($request->all())) {
            $token = auth()->user()->createToken('Foodbank')->accessToken;
            return response()->json(['messsage'=>'Signed In Successfully','token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    } 
    public function updatePassword(Request $request){
       $user=Auth::user();
       
       $validator=Validator::make($request->all(), [
            'current_password' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);
       if ($validator->fails()) {
          return response()->json([
              'error' => true,
              'msg' => $validator->errors()
          ]);
      }

      if (Hash::check($request->current_password, $user->password)){
        if (Hash::check($request->current_password, $request->password)){
            return response()->json(['error'=>true, 'message'=>'You cannot use the same password']);   
        }
        $user->password=bcrypt($request->password);
        $user->save();}
        return response()->json(['error'=>false, 'message'=>'Password Successfully Updated']);
    }
    public function UserCreate($user_id, $firstname, $lastname){
        Wallet::create([
            'user_id' => $user_id,
            'balance' => 0.00,
        ]);
        UserDetail::create([
            'user_id' => $user_id,
            'firstname' => $firstname,
            'lastname' => $lastname
        ]);
        Billing::create([
            'user_id' => $user_id,
        ]);
        LoanWallet::create([
            'user_id' => $user_id,
            'balance' => 0.00,
        ]);
        UserToken::create([
            'user_id' => $user_id,
        ]);
    }

     
}
