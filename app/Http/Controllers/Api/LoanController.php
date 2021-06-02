<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeclinedLoan;
use App\Models\Interest;
use App\Models\Loan;
use App\Models\LoanApproval;
use Illuminate\Http\Request;
use App\Models\LoanRequest;
use App\Models\LoanWallet;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LoanController extends Controller
{
   public function requestLoan(Request $request){
       $user=Auth::user();

       $validator=Validator::make($request->all(), [
        'amount' => 'required|numeric',
        'duration' =>  [
            'required',
            Rule::in([3, 6, 9, 12]),
        ],
    ]);

    if ($validator->fails()) {
        return response()->json([
            'error' => true,
            'message' => $validator->errors()
        ]);
    }

    $interest=Interest::where('duration',$request->duration)->value('percentage');

    LoanRequest::create([
        'user_id'=> $user->id,
        'amount'=>$request->amount,
        'duration'=>$request->duration,
        'repayment_amount'=>$request->amount + ($request->amount * ($interest/100))
     ]);
     Notification::create([
        'user_id'=>$user->id,
        'type'=>"New Loan Request",
        'message'=>"Loan Request of ".$request->amount,
    ]);

    return response()->json(['error'=>false, 'message'=>"Loan Request was Successful"]);
   
   }

   public function loans(){
    $user=Auth::user();
    $loans=LoanRequest::where('user_id',$user->id)->get();
    return $loans;
}

   public function getLoanStatus($id){
    $status="Pending";
    $loan_disbursed=LoanApproval::where('request_id', $id)->first();  
    if($loan_disbursed){
        $status="Disbursed";
    }
    $loan_declined=DeclinedLoan::where('request_id', $id)->first();
    if($loan_declined){
        $status="Declined";
    }
    $loan_redeemed=Loan::where('request_id', $id)->first(); 
    if($loan_redeemed){
        $status="Redeemed";
    }

   
        return response()->json(['error'=>true, 'status'=>$status]); 
   
}

public function redeemLoan(Request $request){
    $user=Auth::user();
    $validator=Validator::make($request->all(), [
        'request_id' => 'required|numeric',
        'repayment_frequency' => 'required|string',Rule::in(['daily', 'weekly','monthly']),
        'card_id' => 'numeric',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'error' => true,
            'message' => $validator->errors()
        ]);
    }
    
    $loan_disbursed=LoanApproval::where('request_id', $request->request_id)->first();  
    $loan_redeemed=Loan::where('request_id', $request->request_id)->first(); 
    if(!$loan_disbursed){
        return response()->json(['error'=>true, 'message'=>'Loan has not been Disbursed']); 
    }
    if($loan_redeemed){
        return response()->json(['error'=>true, 'message'=>'Loan has already been redeemed']); 
    }

    Loan::create([
        'request_id' => $request->request_id,
        'repayment_frequency' => $request->repayment_frequency,
        'card_id' => 1,
    ]);
    $amount=LoanRequest::where('id', $request->request_id)->value('amount');
    $repayment_amount=LoanRequest::where('id', $request->request_id)->value('repayment_amount');

            $loanwallet=LoanWallet::where('user_id', $user->id)->first();
            $loanwallet->balance = $loanwallet->balance + $repayment_amount;
            $loanwallet->save();

            $wallet=Wallet::where('user_id', $user->id)->first();
            $wallet->balance=$wallet->balance + $amount;
            $wallet->save();


            return response()->json(['error'=>true, 'message'=>'Loan Redeemed']); 
    
}




}
