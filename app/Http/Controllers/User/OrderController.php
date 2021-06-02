<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Delivery;
use App\Models\LoanRequest;
use App\Models\Notification;
use App\Models\Wallet;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function newOrder(Request $request){
        $validator=Validator::make($request->all(),  [
            'product_id' => 'required|array',
            'quantities' => 'required|array',
        ]);
        if ($validator->fails()) {
            return $validator->errors()->first();
            return redirect()->back()->with('error' , $validator->errors()->first());
        }

        $total_items=count($request->product_id);

        $unit_amount=array();
        $total_amount=array();
        $order_amount=0;

        for($i=0; $i<$total_items; $i++){
            $price=Product::where('id', $request->product_id[$i])->value('amount');
            $total=$price * $request->quantities[$i];
            array_push($unit_amount, $price);
            array_push($total_amount, $total);
        }
        
        foreach($total_amount as $total){
            $order_amount=$order_amount + $total;
        }

        $user= Auth::user();
        $user_balance=Wallet::where('user_id', $user->id)->value('balance');

        if($user_balance < $order_amount){

            $loan_amount=$order_amount-$user_balance;
            LoanRequest::create([
                 'user_id'=> $user->id,
                 'amount'=>$loan_amount,
            ]);
        }


        $order=Order::create([
            'user_id'=>$user->id,
            'amount'=>$order_amount,
        ]);

        for($i=0; $i<$total_items; $i++){
            
            OrderProduct::create([
                'order_id'=>$order->id,
                'product_id'=>$request->product_id[$i],
                'quantity'=>$request->quantities[$i],
                'unit_amount'=>$unit_amount[$i],
                'total_amount'=>$total_amount[$i],
            ]);
        }
        Notification::create([
            'user_id'=>$user->id,
            'type'=>"New Order",
            'message'=>"Order received with id ox".$order->id."fb",
        ]);

        session()->forget('cart');

        return redirect()->route('checkout-success')->with(["message"=>"Order has been Placed Successfully","order_id"=>$order->id]); 
    }
    
    public function orders(){
        $user=Auth::user();
        $orders=Order::where('user_id', $user->id);

        return response()->json(["error"=>false, "orders"=>$orders]); 
    }

    public function orderProducts($order_id){
        $products=OrderProduct::where('order_id', $order_id);

        return response()->json(["error"=>false, "order_products"=>$products]); 
    }
    public function orderStatus($order_id){
        $order=Delivery::where('order_id', $order_id)->first();

        return response()->json(["error"=>false, "order"=>$order]); 
    }
}
