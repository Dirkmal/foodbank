<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Billing;
use App\Models\LoanWallet;
use App\Models\UserToken;
use App\Models\Wallet;
use App\Models\Coordinator;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\User\TokenController;
use App\Notifications\UserWelcome;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'institution_id' => 'integer',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error' , $validator->errors()->first());
        }
        $user = User::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' =>0,   
        ]);

        $this->UserCreate($user->id, $request->firstname, $request->lastname);
        if($request->institution_id){
            $this->CoordinatorCreate($user->id, 1);
        }
        $tokenize=new TokenController;
        $otp=$tokenize->createToken($user->id);

        $user->notify(new UserWelcome($request->firstname, $otp));
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user=Auth::user();
            $is_coordinator=Coordinator::where('coordinator_id', $user->id)->first();
                if($is_coordinator){
                    return redirect('coordinator/verify-account');  
                }
            return redirect()->intended('dashboard');
        }
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
    public function CoordinatorCreate($user_id, $institution_id){
        Coordinator::create([
            'coordinator_id' => $user_id,
            'institution_id' => $institution_id,
        ]);
    }
}
