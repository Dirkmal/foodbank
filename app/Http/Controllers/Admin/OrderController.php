<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Delivery;
use App\Models\Log;
use App\Models\Notification;

class OrderController extends Controller
{
    public function orders(){
        $orders=Order::get();

        return response()->json(["error"=>false, "orders"=>$orders]); 
    }
    public function order($order_id){
        $order=Order::where('id', $order_id);
        return response()->json(["error"=>false, "order"=>$order]); 
    }
    public function deliveryStatus($order_id){
        $status=Delivery::where('id', $order_id);
        return response()->json(["error"=>false, "order"=>$status]); 
    }

    public function order_products($order_id){
        $products=OrderProduct::where('order_id', $order_id);

        return response()->json(["error"=>false, "order_products"=>$products]); 
    }
    public function processOrder($order_id){
        $user_id=Order::where('id', $order_id)->value('user_id');
        Delivery::create([
            'order_id'=>$order_id,
        ]); 
        
        Notification::create([
            'user_id'=>$user_id,
            'type'=>'   Order Processed',
            'message'=>'Your Order with id ox'.$order_id.'fb has been processed for delivery'
        ]);

        Log::create([
            'type'=>'Order Processed',
            'message'=>'Order with id ox'.$order_id.'fb was processed for delivery'
        ]);
        return back()->with(["message"=>'Order processed for delivery Successfully']);
    }
    public function deliverOrder($order_id){
        $user_id=Order::where('id', $order_id)->value('user_id');
        $order_delivery= Delivery::where('order_id',$order_id)->first();
        $order_delivery->status='Delivered';
        $order_delivery->save();
       
        Notification::create([
            'user_id'=>$user_id,
            'type'=>'   Order Delivered',
            'message'=>'Your Order with id ox'.$order_id.'fb has been delivered'
        ]);

        Log::create([
            'type'=>'Order Delivered',
            'message'=>'Order with id ox'.$order_id.'fb was delivered'
        ]);

        return back()->with(["message"=>'Order marked as delivered Successfully']);
    }
   

}
