<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DetailsController extends Controller
{
    public function details(){
        $user=Auth::user();
        $details=UserDetail::where('user_id', $user->id)->first();

        return response()->json(["error"=>false, "details"=>$details]); 
    }
    public function update(Request $request){
        $validator=Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'employment_status' => 'required|string',
            'monthly_income' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ]);
        }

        $user=Auth::user();
        $details=UserDetail::where('user_id', $user->id)->first();

        $details->firstname=$request->firstname;
        $details->lastname=$request->lastname;
        $details->employment_status=$request->employment_status;
        $details->monthly_income=$request->monthly_income;
       
        $details->save();

        return response()->json(["error"=>false, "message"=>"Details Updated Successfully"]); 
    }
    
}
