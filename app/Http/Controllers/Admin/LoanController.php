<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coordinator;
use App\Models\DeclinedLoan;
use App\Models\LoanApproval;
use App\Models\LoanRequest;
use App\Models\LoanWallet;
use App\Models\Log;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function declineLoan($request_id){
        DeclinedLoan::create([
            'request_id'=>$request_id,
        ]);  
        $amount=LoanRequest::where('id', $request_id)->value('amount'); 
        $user_id=LoanRequest::where('id', $request_id)->value('user_id'); 

        Notification::create([
            'user_id'=>$user_id,
            'type'=>'Loan Disbursed',
            'message'=>'Your requested loan of N'.$amount.' has been Declined'
        ]);

        Log::create([
            'type'=>'Loan Declined',
            'message'=>'loan of N'.$amount.' was Declined'
        ]);
        return back()->with(["message"=>'Loan Declined Successfully']);
    }
    public function disburseLoan($request_id){
        LoanApproval::create([
            'request_id'=>$request_id,
        ]);  
        $amount=LoanRequest::where('id', $request_id)->value('amount'); 
        $user_id=LoanRequest::where('id', $request_id)->value('user_id'); 
        
        $is_coordinator=Coordinator::where('coordinator_id',$user_id)->first();
        
        if($is_coordinator){
            $loanwallet=LoanWallet::where('user_id', $user_id)->first();
             $loanwallet->balance=$loanwallet->balance + $amount;
            $loanwallet->save();
        }
        

        Transaction::create([
                'user_id'=>$user_id,
                'transaction_type'=>'Loan Disbursed',
                'transaction_ref'=>$date = date('mdYhis', time()),
                'transaction_id'=>$date = date('mdYhis', time()),
                'amount'=>$amount
        ]);

       Notification::create([
            'user_id'=>$user_id,
            'type'=>'Loan Disbursed',
            'message'=>'Your requested loan of N'.$amount.' has been approved'
        ]);

        Log::create([
            'type'=>'Loan Disbursed',
            'message'=>'loan of N'.$amount.' was Disbursed'
        ]);
        
        return back()->with(["message"=>'Loan Disbursed Successfully']);
    }
}
