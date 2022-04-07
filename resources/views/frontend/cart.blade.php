@extends('frontend.front-master')

@section('frontcontent')
    <div class="main-container col1-layout content-color color">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li class="home"> <a href="{{ url('/') }}" title="Go to Home Page">Home</a></li>
                    <li> <strong>My Cart</strong></li>
                </ul>
            </div>
        </div>
        <!--- .breadcrumbs-->

        <div class="container">
            <div class="content-top no-border">
                <h2>My Cart</h2>
            </div>
            <div class="table-responsive-wrapper">
                <table class="table-order table-wishlist">
                    <thead>
                        <tr>
                            <td>Remove</td>
                            <td>Product Detail</td>
                            <td>Add to cart</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total=0;
                        @endphp
                        @foreach ($cartitems as $item)
                            <tr>
                                <td><button type="button" onclick="remove_cart({{ $item->product_id }})"
                                        class=" button-remove remove-cart-item"><i class="icon-close"></i></button></td>
                                <td>
                                    <table class="table-order-product-item">
                                        <tr>
                                            <td>
                                                <div class="product-hover">
                                                    <img id="product-collection-image-8" class="img-responsive"
                                                        src="/uploads/products/{{ $item->product->image }}" alt=""
                                                        height="200" width="200">
                                                    <span class="product-img-back"> <img class="img-responsive"
                                                            src="/uploads/products/{{ $item->product->image }}" alt=""
                                                            height="100" width="100"> </span>
                                                </div>
                                            </td>
                                            <td>
                                                <p>{{ $item->product->name }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                
                                        <td class="wish-list-control">
                                            <div class="price_{{ $item->product_id }}">
                                                <p>₹{{ $item->product->price*$item->qty}}</p>
            
                                            </div>
                                            <input type="hidden" class="product_id" value="{{ $item->product_id }}">
                                            <div class="number-input">
                                                <button type="button" class="minus" data-product_id="{{ $item->product_id }}" id="{{$item->product_id}}" >-</button>
                                                <input type="text" value="{{$item->qty}}" name="qty" class="qty data_input_qty" maxlength="2" id="qty_data_{{ $item->product_id }}" data-product_id="{{ $item->product_id }}" readonly>
                                                <button type="button" class="plus" data-product_id="{{ $item->product_id }}">+</button>
                                                {{-- <input type="hidden" name="product_id" id="qty_data_{{ $item->product_id }}"> --}}
                                                <input type="hidden" name="price" id="{{ $item->product->price }}">
                                            </div>
                                        </td>
                            </tr>
                            @php
                                $total += $item->product->price * $item->qty;
                            @endphp
                        @endforeach
                        <tr bgcolor="#EBECEE" lign="center">
                            <td></td>
                            <td><h3>Total:{{ $total }}</h3></td>
                            <td>
                                <a href="{{url('/billing')}}" class="btn-step checkout">Checkout</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--- .table-responsive-wrapper-->
        </div>
        <!--- .container-->
    </div>
    <!--- .main-container -->
    <div class="footer-container footer-color color">
    @endsection
    @push('front-script')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function remove_cart(product_id) {
                console.log(product_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '/removecart',
                    data: {
                        'product_id': product_id,
                    },
                    success: function(response) {
                        swal("", response.status, "success");
                        // $("#content").html(response);
                        window.location.reload();
                    }
                });
            }
            
            $('.plus,.minus,.qty').click(function (e) {
            e.preventDefault();

            var product_id = $(this).attr('data-product_id');
            console.log('product_id',product_id);
            var product_qty=$('.data_input_qty').val();
            console.log('product_qty',product_qty);

            data={
                'product_id':product_id,
                'product_qty':product_qty,
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/updatecart",
                data: data,
                success: function (response) {
                    window.location.reload();
                    swal(response.status);
                }
            });
        });
        </script>
    @endpush