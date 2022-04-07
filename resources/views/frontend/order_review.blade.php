@extends('frontend.front-master')

@section('frontcontent')
<div class="wrapper"> 
	<div class="page">
		<div class="main-container col1-layout content-color color">
			<div class="breadcrumbs">
				<div class="container">
					<ul>
						<li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
						<li> <strong>Order_detail</strong></li>
					</ul>
				</div>
			</div><!--- .breadcrumbs-->
                <div class="row">
                    <div class="col-3">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">My Orders</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-3">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th>Total Price</th>
                                    <th>Payment Method</th>
                                    <th>Order Date</th>
                                    <th class="text-center">Status</th>
                                    {{-- <th class="text-center">Action</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_details as $key=>$order)
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        
                                        <td>₹{{$order->totalprice}}</td>
                                        <td>{{$order->payment_method==1?'Credit Card':'Cash On Delivery'}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td class="dispaly_status text-center">
                                            {{$order->order_status=='p'?'Pending':($order->order_status=='otw'?'On The Way':'On The Way')}}
                                        </td>
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->
                <!-- end row -->
            </div> <!-- container -->
        
@endsection

