<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function notifications(){
        $user=Auth::user();
        $notifications=Notification::where('user_id', $user->id)->orderBy('id','DESC')->get();

        return response()->json(["error"=>false, "notifications"=>$notifications]); 
    }

    public function markRead($id){
        $user=Auth::user();
        $notification=Notification::where('id', $id)->first();
        $notification->status=1;
        $notification->save();
        
        return response()->json(["error"=>false]); 
    }
}
