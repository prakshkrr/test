<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Category\Models\Category;
use App\Modules\Color\Models\Color;
use App\Modules\Product\Models\Product;
use App\Models\cart;
use Auth;
use DB;


class CartController extends Controller
{
    public function cart()
        {
            $cartitems = cart::where('user_id',Auth::id())->get(); 
            $product=Product::where('deleted_at',0)
            ->where('status',1)->get();   
            return view('frontend.cart',compact('cartitems'));
        }

    public function addtocart(Request $request)
    {
       $product_id=$request->input('product_id');
       $product_qty=$request->input('product_qty');
       if (Auth::check()) {
           $product= Product::where('id',$product_id)->first();
           if ($product) {
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                     return response()->json(['status'=> "Already added to cart "]);
                }
                else{
                    $cartitems = new Cart();
                    $cartitems->product_id = $product_id;
                    $cartitems->user_id = Auth::id();
                    $cartitems->qty = $product_qty;
                    $cartitems->save();
                    return response()->json(['status'=> " added to cart "]);
                }
            }
       }
       else
       {
            return response()->json(['status'=> "Login to continue "]);
       }
     }
     public function removecart(Request $request){
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if (Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()) {
                $cartitems = Cart::where('user_id',Auth::id())->where('product_id',$product_id)->first();
                $cartitems-> delete();
                return response()->json(['status'=> "Deleted successfull"]);
            }
        }
         else
        {
            return response()->json(['status'=> "Login to continue "]);
        }
    }
    public function updatecart(Request $request)
    {
        // dd('test');
        $product_id= $request->input('product_id');
        $product_qty= $request->input('product_qty');
        if(Auth::check())
        {
            $qty2 = Product::where('id',$product_id)->first(['stock']);
            if($product_qty < 6 && $product_qty > 0 && $product_qty <= $qty2->stock  )
            {
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    $cart= Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                    $cart->qty= $product_qty;
                    $cart->update();
                    return response()->json(['status'=>"Quantity updated!"]);
                }
            }
            else
            {
                return response()->json(['status'=>"Enter valid Quntity !!"]);
            }
        }
    }
    
}