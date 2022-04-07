@extends('frontend.front-master')

@section('frontcontent')	
			<div class="main-container col1-layout content-color color">
				<div class="breadcrumbs">
					<div class="container">
						<ul>
							<li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
							<li> <strong>Shipping Detail</strong></li>
						</ul>
					</div>
				</div><!--- .breadcrumbs-->
				
				<div class="woocommerce">
					<div class="container">
						
						<div class="checkout-step-process">
							<ul>
								<li>
									<div class="step-process-item"><i data-href="checkout-step2.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Billing Address</span></div>
								</li>
								<li>
									<div class="step-process-item active"><i data-href="checkout-step4.html" class="redirectjs step-icon icon-wallet"></i><span class="text">Shipping</span></div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step5.html" class="redirectjs step-icon icon-notebook"></i><span class="text">payment</span></div>
									</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step5.html" class="redirectjs step-icon icon-notebook"></i><span class="text">order</span></div>
								</li>
							</ul>
						</div><!--- .checkout-step-process --->
						<form name="checkout" method="post" class="checkout woocommerce-checkout form-in-checkout"   action="{{ url('/addshipping') }}">
							{!! csrf_field() !!}
							<ul class="row">
								<li class="col-md-9">
									<div class="checkout-info-text">
										<h3>shipping Address</h3>
									</div>
									<div class="woocommerce-billing-fields">
										<ul class="row">
											@if(!$shipping_address->isEmpty())		
                                            <div id="prev_address">
                                                <div class="col-md-12"  style="padding-bottom: 35px;" >
                                                    <ul class="list-inline">
                                                        <li class="row prev_address_list">
                                                            @foreach($shipping_address as $key=>$shipping_address)
                                                                <p class="col-md-8">
                                                                    <label><input type="radio" id="shipping_address" name="shipping_address_id" class="pre_shipping_address_id" checked  value="{{$shipping_address->id}}">{{$shipping_address->firstname}}
                                                                    {{$shipping_address->lastname}},{{$shipping_address->emailid}},{{$shipping_address->country}}, {{$shipping_address->city}},{{$shipping_address->phonenumber}},{{$shipping_address->state}},{{$shipping_address->zipcode}}</label>
                                                                </p>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                    <span class="form-radio">
                                                        <input type="radio" name="shipping_address_id" class="pre_shipping_address_id" id="add_new_address_radio"value="0">
                                                        <label for="add_new_address_radio">Add New Address</label>
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
										<div class="bilingadd" style="display: none;">
										<li class="col-md-6">
											<p class="form-row validate-required" id="shipping_first_name_field">
												<label for="firstname" class="">First Name <abbr class="required" title="required">*</abbr></label>
												<input type="text" class="input-text " name="firstname" id="firstname" placeholder="Enter your full name" value="">
											</p>
										</li>
										<li class="col-md-6">
											<p class="form-row validate-required" id="billing_first_name_field">
												<label for="lastname" class="">Lastname <abbr class="required" title="required">*</abbr></label>
												<input type="text" class="input-text " name="lastname" id="lastname" placeholder="Enter your full name" value="">
											</p>
										</li>
										<li class="col-md-6">
											<p class="form-row validate-required" id="billing_first_name_field">
												<label for="phonenumber" class="">phone number <abbr class="required" title="required">*</abbr></label>
												<input type="text" class="input-text " name="phonenumber" id="phonenumber" placeholder="Enter your full name" value="">
											</p>
										</li>
										<li class="col-md-6">
											<p class="form-row validate-required" id="billing_first_name_field">
												<label for="emailid" class="">Email Id <abbr class="required" title="required">*</abbr></label>
												<input type="text" class="input-text " name="emailid" id="emailid" placeholder="Enter your full name" value="">
											</p>
										</li>
										<li class="col-md-6">
											<p class="form-row form-row-wide address-field validate-required" id="billing_city_field">
												<label for="city" class="">City <abbr class="required" title="required">*</abbr></label>
												<input type="text" class="input-text " name="city" id="city" placeholder="Enter Your city name" value="">
											</p>
										</li>
										<li class="col-md-6">
											<p class="form-row address-field validate-state" id="shipping_state_field">
												<label for="state" class="">State</label>
												<input type="text" class="input-text " name="state" id="state" placeholder="Enter Your state name" value="">
											</p>
										</li>
										<li class="col-md-6">
											<p class="form-row address-field validate-postcode woocommerce-validated" id="billing_postcode_field">
												<label for="zipcode" class="">Pincode <abbr class="required" title="required">*</abbr></label>
												<input type="text" class="input-text " name="zipcode" id="zipcode" value="">
											</p>
										</li>
										<li class="col-md-6">
											<p class="form-row address-field validate-state" id="billing_state_field" data-o_class="form-row form-row-first address-field">
												<label for="country" class="">Country<abbr class="required" title="required">*</abbr></label>
												<input type="text" class="input-text " name="country" id="country" value="">
											</p>
										</li>
										</div>
										</ul>
									</div><!--- .woocommerce-billing-fields--->	
									
									<div class="checkout-col-footer">
										<a href="{{ url('/billing') }}" value="Back" class="btn-step ">Back</a>
										<input type="submit" value="Continue" class="btn-step">									
										<div class="note">(<span>*</span>) Required fields</div>
									</div><!--- .checkout-col-footer--->	
								</li>
							</ul>
						</form>
						<div class="line-bottom"></div>
					</div><!--- .container--->
				</div><!--- .woocommerce--->				
			</div><!--- .main-container -->
@endsection
@push('front-script')
<script>
	$('.pre_shipping_address_id').on('click',function(){
		let shipping_id=$(this).val();
		if(shipping_id==0)
		{
			$('.bilingadd').show();
		}
		else
		{
			$('.bilingadd').hide();	
		}
	})
</script>
@endpush
	