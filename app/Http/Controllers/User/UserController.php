<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDetail;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\LoanWallet;
use App\Models\Notification;


class UserController extends Controller
{
    public function user(){
        $user= Auth::user();

        $details=(object)array();
        $details->userdetail=UserDetail::where('user_id', $user->id)->first();
        $details->notifications=Notification::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
        $details->transactions=Transaction::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
        $details->wallet=Wallet::where('user_id', $user->id)->first();
        $details->loanwallet=LoanWallet::where('user_id', $user->id)->first();
        $details->orders=Order::where('user_id', $user->id)->orderBy('id', 'DESC')->get();

        return $details;
    }
    public function getOrderStatus($id){
        $orderstatus=Delivery::where('order_id', $id)->value('status');
        if(!$orderstatus){
            $orderstatus="Pending";
        }
        return $orderstatus;
    }
}
