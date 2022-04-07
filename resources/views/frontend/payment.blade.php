@extends('frontend.front-master')

@section('frontcontent')

<div class="main-container col1-layout content-color color">
				<div class="breadcrumbs">
					<div class="container">
						<ul>
							<li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
							<li> <strong>Payment</strong></li>
						</ul>
					</div>
				</div><!--- .breadcrumbs-->
				
				<div class="woocommerce">
				
				
					<div class="container">
						
						<div class="checkout-step-process">
							<ul>
								
								<li>
									<div class="step-process-item">
										<i data-href="checkout-step2.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Billing Address</span>
									</div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step2.html" class="redirectjs fa fa-check step-icon"></i><span class="text">shipping</span></div>
								</li>
								<li>
									<div class="step-process-item active"><i data-href="checkout-step4.html" class="redirectjs step-icon icon-wallet"></i><span class="text">payment</span></div>
								</li>
								<li>
									

									
									
									<div class="step-process-item"><i data-href="checkout-step2.html" class="redirectjs  step-icon icon-wallet"></i><span class="text">order</span></div>
								</li>
							</ul>
						</div>
						
						
						<div class="checkout-info-text">
							<h3>Payment Method</h3>
						</div>
						<div class="content-radio">
							<input type="radio" name="payment-radio" checked id="pr1">
							<label for="pr1" class="label-radio">Case On Delevery</label>
							<p>Pay for the package when you recieve it.</p>
						</div>
						
						
						
						<div class="checkout-col-footer">
							
							<a href="{{url('/shipping')}}" class="btn-step continue">Back</a>
							<a href="{{url('/order')}}" class="btn-step continue">Continue</a>
						</div>
						<div class="line-bottom"></div>
					</div>
				</div><!--- .woocommerce-->
				
					
			</div><!--- .main-container -->
				
		</div><!--- .page -->
	</div><!--- .wrapper -->
	@endsection
	@push('script')
		
	
	<script type="text/javascript" src="assets/scripts/jquery.min.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery.noconflict.js"></script>
	<script type="text/javascript" src="assets/scripts/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery.bxslider.js"></script> 
	<script type="text/javascript" src="assets/scripts/jquery.ddslick.js"></script> 
	<script type="text/javascript" src="assets/scripts/jquery.easing.min.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery.meanmenu.hack.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery.animateNumber.min.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery.heapbox-0.9.4.min.js"></script>
	<script type="text/javascript" src="assets/scripts/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="assets/scripts/packery-mode.pkgd.min.js"></script>
	<script type="text/javascript" src="assets/scripts/video.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery-ui.js"></script>
	
	<script type="text/javascript" src="assets/scripts/magiccart/magicproduct.js"></script> 
	<script type="text/javascript" src="assets/scripts/magiccart/magicaccordion.js"></script> 
	<script type="text/javascript" src="assets/scripts/magiccart/magicmenu.js"></script>
	
	<script type="text/javascript" src="assets/scripts/script.js"></script>
	<!--[if lt IE 9]> 
	<script type="text/javascript" src="assets/scripts/bootstrap/html5shiv.js"></script>
	<script type="text/javascript" src="assets/scripts/bootstrap/respond.min.js"></script> <![endif]-->
	<!--[if lt IE 7]> 
	<script type="text/javascript" src="assets/scripts/lte-ie7.js"></script>
	<script type="text/javascript" src="assets/scripts/ds-sleight.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/styles/styles-ie.css" media="all" /> <![endif]-->
	@endpush