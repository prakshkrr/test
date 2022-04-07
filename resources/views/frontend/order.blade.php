@extends('frontend.front-master')

@section('frontcontent')

<div class="wrapper"> 
	<div class="page">
		<div class="main-container col1-layout content-color color">
			<div class="breadcrumbs">
				<div class="container">
					<ul>
						<li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
						<li> <strong>Order</strong></li>
					</ul>
				</div>
			</div><!--- .breadcrumbs-->
			
			<div class="woocommerce">
				<div class="container">
					
					<div class="checkout-step-process">
						<ul>
							<li>
								<div class="step-process-item"><i data-href="checkout-step2.html"  class="redirectjs  step-icon fa fa-check"></i><span class="text">Billing Address</span></div>
							</li>
							<li>
								<div class="step-process-item"><i class="fa fa-check step-icon "></i><span class="text">Shipping Address</span></div>
							</li>

							<li>
								<div class="step-process-item "><i data-href="checkout-step4.html"  class="redirectjs  step-icon fa fa-check"></i><span class="text">Delivery & Payment</span></div>
							</li>
							<li>
								<div class="step-process-item active"><i data-href="checkout-step5.html"  class="redirectjs  step-icon icon-notebook"></i><span class="text">Order Review</span></div>
							</li>
							
							<li>
								
							</li>
						</ul>
					</div><!--- .checkout-step-process --->			
					<form action="{{url('/orderda')}}" method="POST" name="placeorder_form">
						@csrf
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<ul class="row">
						<li class="col-md-9 col-padding-right">
							<table class="table-order table-order-review">
								<thead>
									<tr>
										<td width="68">Product Name</td>
										<td width="14">price</td>
										<td width="14">QTY</td>
										<td width="14">Total</td>
									</tr>
								</thead>


								<tbody>
									@php $total=0 @endphp
							
									@foreach ($cartitems as $item)

									@php $total += $item->qty * $item->product->price @endphp
										
									
									<tr>
										<td class="name">{{ $item->product->name }}</td>
										<input type="hidden" name="product_id[]" value="{{ $item->id }}">
										
										<td>{{ $item->product->price }}</td>
								  <input type="hidden" name="price[]" value="{{ $item->price }}">

										<td>{{ $item->qty }}</td>
										<input type="hidden" name="qty[]" value="{{ $item->qty }}">

										<td class="price">{{ $item->qty * $item->product->price }}</td>
										<input type="hidden" name="sub_total[]" value="{{$item->qty * $item->price}}">
										
									</tr>
																	
								</tbody>
								@endforeach
							</table>
							<table class="table-order table-order-review-bottom">
								
								<tr>
									<td class="first large" width="80%">Total Payment</td>
									<td class="price large" width="20%">{{ $total }}</td>
									<input type="hidden" name="total_price" value="{{ $total }}">
								</tr>
								<tfoot>
									<td colspan="2">
										
										<div class="right">
											
											<a class="btn-step" href="{{ url('/payment') }}">Back</a>
											<input type="submit" value="Place order" class="btn-step btn-highligh">
											
										</div>
									</td>
								</tfoot>
							</table>
						</li>
						<li class="col-md-3">
							<ul class="step-list-info">
								@foreach ($billing_address as $billing)
									
								<li>
									<div class="title-step">Billing Address
										<!-- <a href="#">CHANGE</a></div> -->
									<p><strong>{{ $billing->firstname }} {{ $billing->lastname }}</strong><br>
									{{ $billing->state }},{{ $billing->zipcode }},{{ $billing->emailid }}<br>
									{{ $billing->city }},{{ $billing->country }} <br>
									{{ $billing->phonenumber }}
									</p>
								</li>
								@endforeach
								<li>
									@foreach ($shipping_address as $shipping)
									<div class="title-step">Shipping Address
										<!-- <a href="#">CHANGE</a></div> -->
									<p><strong>{{ $shipping->firstname }} {{ $shipping->lastname }} </strong><br>
										{{ $shipping->state }},{{ $shipping->zipcode }},{{ $shipping->emailid }}<br>
										{{ $shipping->city }},{{ $shipping->country }} <br>
										{{ $shipping->phonenumber }}
									</p>
								</li>
								@endforeach
								
								<li>
									<div class="title-step">Payment Method
										<!-- <a href="#">CHANGE</a> -->
									</div>
									<p>Check / Money order</p>
								</li>
							</ul>
						</li>
					</ul>
				</form>
					
					<div class="line-bottom"></div>
				</div><!--- .container-->	
			</div><!--- .woocommerce-->
		</div><!--- .main-container -->
	</div><!--- .page -->
</div><!--- .wrapper -->
@endsection