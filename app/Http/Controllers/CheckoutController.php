<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Modules\Category\Models\Category;
use App\Modules\Color\Models\Color;
use App\Modules\Product\Models\Product;
use App\Models\cart;
use App\Models\Billing;
use App\Models\Shipping;
use App\Models\order;
use App\Models\order_detail;
use Auth;
use Illuminate\Support\Facades\Session;



class CheckoutController extends Controller
{

    public function billing(){
         
        if (Auth::check()) {
        $billing_address = Billing::where('user_id',Auth::id())->get(); 
        return view('frontend.billing',compact('billing_address'));
        }
        else{
            return response()->json(['status'=> "Login to continue "]);
        }
     }
    public function addbilling(Request $request){
       
      $billing_id = $shipping_id = '';
         if ($request->billing_address_id == 0) {
             $data = [
            
                 'user_id' => Auth::id(), 
                 'firstname' => $request->firstname,
                 'lastname' => $request->lastname,
                 'status' => $request->shipping_method,
                 'emailid' => $request->emailid,
                 'city' => $request->city,
                 'state' => $request->state,
                 'zipcode' => $request->zipcode,
                 'country' => $request->country,
                 'phonenumber' => $request->phonenumber,  
       ];
       $addresses = Billing::create($data);
             $billing_id = $addresses->id;
         }     
    else
        {
          $billing_id = $request->billing_address_id;

        }
        if(isset($request->shipping_method) && $request->shipping_method == 1){
             $shipping_id = $billing_id;
          }
         $checkout_arr= [
             'billing_id'=> $billing_id,
             'shipping_id'=> $shipping_id,
         ];
 
        // dd($checkout_arr);
          session()->put('checkout', $checkout_arr);

         if($request->shipping_method == 1){
             return redirect('/payment');
         }
         else{
             return redirect('/shipping');
         }
      
     }
  
 
 //shiping
         public function Shipping(){
        if (Auth::check()) { 
         $shipping_address = Shipping::where('user_id',Auth::id())->get(); 
         return view('frontend.shipping',compact('shipping_address'));
        }
        else{
            return response()->json(['status'=> "Login to continue "]);
        }
        }
    
        public function addshipping(Request $request){
      
        $billing_id = $shipping_id = '';
        //   dd($request->all());
           if ($request->shipping_address_id == 0) {
            // dd('test');
               $data = [
                'user_id' => Auth::id(), 
                'firstname' => $request->firstname,'required',
                'lastname' => $request->lastname,'required',
                // 'status' => $request->shipping_method,'required',
                'emailid' => $request->emailid,'required',
                'city' => $request->city,'required',
                'state' => $request->state,'required',
                'zipcode' => $request->zipcode,'required',
                'country' => $request->country,'required',
                'phonenumber' => $request->phonenumber, 'required',
         ];
         //dd($data);
   
         $addresses = Shipping::create($data);
        //   dd($addresses );
               $shipping_id = $addresses->id;
          
   
   }     
   else
   {
       
         $shipping_id = $request->shipping_address_id;
       }
            $session_data = session()->get('checkout');
            
           $checkout_arr= [
               'billing_id'=> $session_data['billing_id'],
               'shipping_id'=> $shipping_id,
           ];
            // dd($checkout_arr);
            session()->put('checkout', $checkout_arr);
            // dd(shipping_method);    
            return redirect('/payment');   
       }
    
      public function payment(){
         return view('frontend.payment');
 
     }

     //Order

     public function order(){

        $addresses_id =session::get('checkout');
      // dd($addresses_id);      
        $billing_id=(int)$addresses_id['billing_id'];
        $shipping_id=(int)$addresses_id['shipping_id'];
        $cartitems = cart::where('user_id',Auth::id())->get();         
        $billing_address = Billing::where('id',$billing_id)->where('user_id', Auth::user()->id)->get();
        $shipping_address = Shipping::where('id',$shipping_id)->where('user_id', Auth::user()->id)->get();
        return view('frontend.order',compact('cartitems','billing_address','shipping_address'));
  
     }

     public function orderda(Request $request){

        $session_id = Session::get('checkout');
        // $payment_method = Session::get('payment');

        $billing_id  =(int) $session_id['billing_id'];
        $shipping_id=(int) $session_id['shipping_id'];
        // $payment_id=(int) $payment_method['payment_id'];

            $order_data = order::create([
            'user_id'=>Auth::id(),
            'billing_id'=>$billing_id,
            'shipping_id'=>$shipping_id,
            'payment_id'=>1,
            'totalprice'=>$request->total_price,
            'order_status'=>'on the way',
        ]);

        // dd('shipping_id');
        foreach ($request->product_id as $key => $value) {

            Order_detail::insert([
                 'order_id' => $order_data->id,
                'product_id' => $value,
                'qty' => $request->qty[$key],
                'total_price' => $request->total_price,
            ]);
        }
        
        $Product_id = Product::where('id', $value)->decrement('stock', $request->qty[$key]);

        Cart::where('User_id', Auth::user()->id)->delete();

        return redirect('/');
    }

    //Order_Review

    public function myorder(){
        $product_details=order::where('user_id',Auth::id())->get();
       //dd($product_details);
         return view ('frontend.order_review', compact('product_details'));
    }
      public function tnkyou(){
      return view('frontend.tnkyou');
     }
}
