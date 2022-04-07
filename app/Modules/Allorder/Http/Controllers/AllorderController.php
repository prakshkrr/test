<?php

namespace App\Modules\Allorder\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\order_detail;


class AllorderController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $order = Order::get();
        return view("Allorder::welcome",compact('order'));
    }
    public function invoice($id)
    {
        $order = Order::where('id',$id)->get();
        $Order_detail = Order_detail::where('order_id',$id)->get();
        return view("Allorder::invoice",compact('order','Order_detail'));
    }
    public function edit($id)
    {
        $order = Order::find($id);
        return view('Allorder::edit', compact('order'));
    }
    public function update(request $request,$id)
    {
        Order::where('id',$id)->update(['order_status'=>$request->order_status]);
        return redirect('/admin/allorder/')->with('success','Item Updated successfully!');
        $data=Order::all();
    }
    
}
