<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function store(){
        return view('admin.store');
    }
    public function product($id){
        return view('admin.product')->with(['id'=>$id]);
    }
    public function orders(){
        return view('admin.orders');
    }
    public function loanrequests(){
        return view('admin.loan-requests');
    }
    public function signin(){
        return view('admin.sign-in');
    }
}
