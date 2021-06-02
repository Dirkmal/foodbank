<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\LoanWallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function balance(){
        $user=Auth::user();
        $balance=Wallet::where('user_id', $user->id)->value('balance');

        return response()->json(["error"=>false, "balance"=>$balance]); 
    }
    public function loanbalance(){
        $user=Auth::user();
        $balance=LoanWallet::where('user_id', $user->id)->value('balance');

        return response()->json(["error"=>false, "balance"=>$balance]); 
    }
}
