<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Coordinator;
use App\Models\Delivery;
use App\Models\LoanApproval;
use App\Models\LoanRequest;
use App\Models\DeclinedLoan;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\UserDetail;
use App\Models\User;
use App\Models\OrderProduct;


class DashboardController extends Controller
{
    public function dashboard(){
        $details=(object)array();
        $details->approved_orders=Order::join('deliveries', 'orders.id', '=', 'deliveries.order_id')->where('status', 'Processed')->select('orders.*')->orderBy('id', 'DESC')->get();
        $details->completed_orders=Order::join('deliveries', 'orders.id', '=', 'deliveries.order_id')->where('status', 'Delivered')->select('orders.*')->orderBy('id', 'DESC')->get();
        
        $deliveries = Delivery::pluck('order_id')->all();
        $details->pending_orders = Order::whereNotIn('id', $deliveries)->get();
        

        return $details;
    }
    public function loans(){
        $details=(object)array();
        $approved = LoanApproval::pluck('request_id')->all();
        $declined = DeclinedLoan::pluck('request_id')->all();
        $details->pending=LoanRequest::orderBy('id', 'DESC')->whereNotIn('id', $approved)->whereNotIn('id', $declined)->get();
        $details->disbursed= LoanRequest::orderBy('id', 'DESC')->join('loan_approvals','loan_requests.id','=','loan_approvals.request_id')->select('loan_requests.*')->get();
        $details->declined= LoanRequest::orderBy('id', 'DESC')->join('declined_loans','loan_requests.id','=','declined_loans.request_id')->select('loan_requests.*')->get();
        $details->loans=LoanRequest::get();
        $details->logs=Log::orderBy('id', 'DESC')->get();

        return $details;
    }

    public function getOrderProducts($id){
        $products=OrderProduct::where('order_id', $id)->get();
        return $products;
    }
    public function getOrderStatus($id){
        $orderstatus=Delivery::where('order_id', $id)->value('status');
        if(!$orderstatus){
            $orderstatus="Pending";
        }
        return $orderstatus;
    }

    public function getLoanStatus($id){
        $loan_disbursed=LoanApproval::where('request_id', $id)->first();

        $status="Pending";
        if($loan_disbursed){
            $status="Disbursed";
        }
        $loan_declined=DeclinedLoan::where('request_id', $id)->first();
        if($loan_declined){
            $status="Declined";
        }

        return $status;
    }

    public function getProductname($id){
        $name=Product::where('id', $id)->value('name');
        return $name;

    }

    public function getUserDetails($id){
        $user=UserDetail::where('user_id', $id)->first();
        return $user;
    }
    public function getUser($id){
        $user=User::where('id', $id)->first();
        return $user;
    }
    public function getBillingDetails($id){
        $order=Order::where('id', $id)->first();
        $is_coordinator=Coordinator::where('coordinator_id', $order->user_id)->first();

        if($is_coordinator){
            $billing=Coordinator::where('coordinator_id', $order->user_id)->join('institutions','coordinators.institution_id','=','institutions.id')->select('institutions.*','coordinators.*')->get();    
        }
        else{
            $billing=Billing::where('user_id', $order->user_id)->first();
        }

        return $billing;
    }




   
  
}
