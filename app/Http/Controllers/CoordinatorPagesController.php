<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoordinatorPagesController extends Controller
{
   
    public function signin(){
        return view('coordinator.sign-in');
    }
    public function register(){
        return view('coordinator.register');
    }
    public function cart(){
        return view('coordinator.cart');
    }
    public function checkout(){
        return view('coordinator.checkout');
    }
    public function checkoutsuccess(){
        return view('coordinator.checkout-success');
    }
    public function chooseverification(){
        return view('coordinator.choose-verification');
    }
    public function coordinatordashboard(){
        return view('coordinator.coordinator-dashboard');
    }
    public function forgotpassword(){
        return view('coordinator.forgot-password');
    }
    public function orders(){
        return view('coordinator.orders');
    }
    public function passwordresetsuccess(){
        return view('coordinator.passwordreset-success');
    }
    public function resetpassword(){
        return view('coordinator.reset-password');
    }
    public function store(){
        return view('coordinator.store');
    }
    public function transactions(){
        return view('coordinator.transactions');
    }
    public function verificationsuccess(){
        return view('coordinator.verification-success');
    }
    public function verifyaccount(){
        return view('coordinator.verify-account');
    }
}
