<div id="products-list">
    <ol class="products-list product_collection" id="products-list">
        @foreach ($product as $product)
            <li class="item">
                <div class="row">
                    <div class="col-mobile-12 col-xs-5 col-md-4 col-sm-4 col-lg-4">
                        <div class="products-list-container">
                            <div class="images-container">
                                <div class="product-hover">
                                
                                    <a href="{{ url('/product',$product->url) }}" title=""
                                        class="product-image">
                                        <img id="product-collection-image-8" class="img-responsive"
                                            src="{{ asset('uploads/products/' . $product->image) }}"
                                            style="height: 200px" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-shop col-mobile-12 col-xs-7 col-md-8 col-sm-8 col-lg-8">
                        <div class="f-fix">
                            <div class="product-primary products-textlink clearfix">
                                <h2 class="product-name"><a href="{{ url('/product', $product->url) }}"
                                        title="{{ $product->name }}">{{ $product->name }}</a>
                                </h2>
                                <div class="ratings">
                                    {{-- <div class="rating-box">
                                        <div class="rating" style="width:70%"></div>
                                    </div> --}}
                                    {{-- <p class="rating-links"> <a href="#">1 Review(s)</a> --}}
                                        {{-- <span class="separator">|</span> --}} {{-- <a href="#">Add Your Review</a> --}}</p>
                                </div>
                                <div class="price-box"> <span class="regular-price">
                                        <span class="price">₹{{ $product->price }}</span>
                                    </span></div>
                            </div>
                            <div class="desc std">
                                <p>{{ $product->discription }}</p>
                            </div>
                            <div class="product-secondary actions-no actions-list clearfix">
                                <p class="action">
                                    {{-- <a>
                                        <button type="button" id="{{ $product->id }}" title="Add to Cart"
                                            data-toggle="modal" data-target="#mymodal"
                                            class="button btn-cart pull-left">
                                            <span>
                                                <i class="icon-handbag icons"></i>
                                                <span>Add to Cart</span>
                                            </span>
                                        </button>
                                    </a> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--- .item-->
        @endforeach
    </ol>
</div>

</div>



