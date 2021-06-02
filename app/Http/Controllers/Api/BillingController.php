<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class BillingController extends Controller
{
    public function billing(){
        $user=Auth::user();
        $billing=Billing::where('user_id', $user->id)->first();

        return response()->json(["error"=>false, "billing"=>$billing]); 
    }
    public function update(Request $request){
        $validator=Validator::make($request->all(), [
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ]);
        }

        $user=Auth::user();
        $billing=Billing::where('user_id', $user->id)->first();

        $billing->address=$request->address;
        $billing->city=$request->city;
        $billing->state=$request->state;
        $billing->save();

        return response()->json(["error"=>false, "message"=>"Billing Details Updated"]); 
    }
    
}
