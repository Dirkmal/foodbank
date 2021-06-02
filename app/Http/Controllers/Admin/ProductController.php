<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function addproduct(Request $request){
        $validator=Validator::make($request->all(),[
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'in_stock' => 'required|integer',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error' , $validator->errors()->first());
        }
        
            $file = $request->file;
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('product_pictures');
            $name='/fb'.$name;
            $file->move($destinationPath, $name); 

            $image_url= url('product_pictures'.$name);

        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image_url'=>$image_url,
            'in_stock'=>$request->in_stock,
            'amount'=>$request->amount,
        ]);

        return back()->with([
            'message' => 'New Product added Successfully',
        ]);
        
    }

    public function editproduct(Request $request){
        $validator=Validator::make($request->all(),[
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'in_stock' => 'required|integer',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error' , $validator->errors()->first());
        }
        
            $product=Product::where('id', $request->product_id)->first();

            if($request->hasFile('file')) {
                
                $file = $request->file;
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('product_pictures');
                $name='/fb'.$name;
                $file->move($destinationPath, $name); 

                $image_url= url('product_pictures'.$name);
                $product->image_url=$image_url;
               }

         $product->name=$request->name;
         $product->description=$request->description;
         $product->in_stock=$request->in_stock;
         $product->amount=$request->amount;
         
         $product->save();

         return back()->with([
            'message' => 'New Product details Updated Successfully',
        ]);    
        }
    public function deleteproduct($id){
           $product=Product::where('id', $id)->first();
           $product->delete();    

           return back()->with([
            'message' => 'Product Deleted Successfully',
        ]); 
    }

    public function product($id){
        $product=Product::where('id', $id)->first();        
        return $product;
 }

 public function products(){
    $products=Product::all();        
    return $products;
}
}
