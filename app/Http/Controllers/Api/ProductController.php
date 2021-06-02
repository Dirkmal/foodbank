<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function products(){
        $products=Product::get();

        return response()->json(["error"=>false, "products"=>$products]); 
    }
    public function product($id){
        $product=Product::where('id', $id)->first();

        return response()->json(["error"=>false, "product"=>$product]); 
    }
}
