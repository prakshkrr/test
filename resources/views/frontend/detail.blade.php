@extends('frontend.front-master')
@section('title')
    <title>Laptop world | Product</title>
@endsection
@section('frontcontent')
    <div class="page">
        <div class="main-container col2-left-layout ">
            <div class="breadcrumbs">
                <div class="container">
                    <ul>
                        <li class="home"> <a href="{{ url('/') }}" title="Go to Home Page">Home</a></li>
                        <li class="category4"> <strong>Detail</strong></li>
                    </ul>
                </div>
            </div>
            @foreach ($product as $product)
                <div class="container product_data">
                    <div class="main">
                        <div class="row">
                            <div class="col-main col-lg-12">
                                <div class="product-view">
                                    <div class="product-essential">
                                        <div class="row">
                                            <form action="#" method="post" id="product_addtocart_form">
                                                <div class="product-img-box clearfix col-md-5 col-sm-5 col-xs-12">
                                                    <div class="product-img-content">
                                                        <div class="product-image product-image-zoom">
                                                            <div class="product-image-gallery">
                                                                 <span class="sticker top-left">
                                                                             
                                                                            </span>
                                                                            
                                                                <img id="image-main"
                                                                    class="gallery-image visible img-responsive"
                                                                    src="{{ url('uploads/products/' . $product->image) }}"
                                                                    alt="laptops" title="laptops" />
                                                            </div>
                                                        </div>
                                                        <!--- .product-image-->
                                                        <div class="more-views">
                                                            <h2>More Views</h2>
                                                            <ul class="product-image-thumbs">
                                                                <li> <a class="thumb-link" href="#" title=""
                                                                        data-image-index="0"> <img
                                                                            class="img-responsive sub_img"
                                                                            src="{{ url('uploads/products/' . $product->image) }}"
                                                                            alt="" /> </a>
                                                                </li>
                                                                @foreach ($subimages as $image)
                                                                    <li>
                                                                        <a class="thumb-link" href="#" title=""
                                                                            data-image-index="1">
                                                                            <img class="img-responsive sub_img"
                                                                                src="{{ url('uploads/products/' . $image->image) }}"
                                                                                alt="" />
                                                                        </a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                        <!--- .more-views -->
                                                    </div>
                                                    <!--- .product-img-content-->
                                                </div>
                                                <!--- .product-img-box-->
                                                <div class="product-shop col-md-7 col-sm-7 col-xs-12">
                                                    <div class="product-shop-content">
                                                        <div class="product-name">
                                                            <h1>{{ $product->name }}</h1>
                                                            <h4>({{ $product->category->name }})</h4>
                                                        </div>

                                                        <div class="product-type-data">
                                                            <div class="price-box">
                                                                <p class="old-price"> <span
                                                                        class="price-label">Regular
                                                                        Price:</span> <span class="price">
                                                                        ₹{{ $product->price }}
                                                                    </span></p>
                                                                <p class="special-price"> <span
                                                                        class="price-label">Special
                                                                        Price</span> <span class="price">
                                                                        ₹{{ $product->price }}
                                                                    </span></p>
                                                            </div>
                                                            @if ($product->stock < 1)
                                                                <p class="availability in-stock ">Availability: <span
                                                                        style="color: red">Out Of Stock
                                                                    </span>
                                                                </p>
                                                            @elseif ($product->stock < 5)
                                                                <p class="availability in-stock ">Availability: <span
                                                                        style="color: red">Hurry up! only
                                                                        {{ $product->stock }} left !!
                                                                    </span>
                                                                </p>
                                                            @else
                                                                <p class="availability in-stock ">Availability: <span>In
                                                                        stock</span>
                                                                </p>
                                                            @endif
                                                            <div class="products-sku"> <span
                                                                    class="text-sku">Product
                                                                    Code: {{ $product->upc }}</span> demo_02</div>
                                                            <div class="products-sku"> <span
                                                                    class="text-sku">Product
                                                                    color: {{ $product->color->name }}</span> demo_02
                                                            </div>
                                                        </div>

                                                        <div class="short-description">
                                                            <h2>Description</h2>
                                                            <p>{{ $product->discription }}</p>
                                                        </div>
                                                        <div class="add-to-box">
                                                             @if ($product->stock < 1)
                                                                    <p class="availability in-stock ">Availab ility: <span
                                                                            style="color: red">Product out Of Stock
                                                                        </span>
                                                                    </p>
                                                            
                                                                @else
                                                            <div class="product-qty">
                                                                <input type="hidden" value="{{ $product->id }} "
                                                                    class="product_id">
                                                                <label for="qty">Qty:</label>
                                                                <div class="custom-qty qtyinput"> <input type="text" name="qty"
                                                                        id="qty" maxlength="5" value="1" title="Qty"
                                                                        class="input-text qty " />
                                                                    <button type="button" class="increase items"
                                                                        onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty < {{ $product->stock }} && qty < 5) result.value++;return false;">
                                                                        <i class="fa fa-plus"></i> </button>
                                                                    <button type="button" class="reduced items"
                                                                        onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) result.value--;return false;">
                                                                        <i class="fa fa-minus">-</i> </button>
                                                                </div>
                                                            </div>
                                                            <div class="add-to-cart">
                                                                
                                                                    <<button type="button" onclick="addtocartBtn()" title="Add to Cart"
                                                                    class="button btn-cart "> <span>
                                                                        <span class="view-cart icon-handbag icons">Add to Cart
                                                                            
                                                                        </span> </span> </button>
                                                                @endif
                                                                
                                                            </div>

                                                        </div>
                                                        <div class="addit">
                                                            <div class="alo-social-links clearfix">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--- .product-shop-content-->
                                                </div>
                                                <!--- .product-shop-->
                                            </form>
                                        </div>
                                    </div>
                                    <!--- .product-essential-->

                                </div>
                                <!--- .product-view-->
                            </div>
                            <!--- .col-main-->
                        </div>
                        <!--- .row-->
                    </div>
                    <!--- .main-->
                </div>
            @endforeach
        </div>
    </div>
    <br><br><br><br><br>
@endsection
@push('front-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
         function addtocartBtn(){
                // var product_id = $(this).closest('.product_data').find('.product_id').val();
                // var product_qty =$(this).closest('.product_data').find('.qtyinput').val();
                var product_id = document.getElementsByClassName("product_id")[0].value;
                var product_qty = document.getElementsByClassName("qty")[0].value;
                console.log(product_id);
                console.log(product_qty);

                // swal(product_id);
                // swal(product_qty);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '/addtocart',
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },

                    success: function(response) {
                        // alert(status);
                        // swal(status);
                        swal("",response.status,"success");

                    }
                });
            }

            $(function() {
            jQuery('.thumb-link')
                .hover(function() {
                    jQuery('#image-main').attr('src', jQuery(this).children('.sub_img').attr('src'));
                });

        });

        
    </script>

@endpush