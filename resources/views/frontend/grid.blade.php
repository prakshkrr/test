<div id="products-grid">
    <ul class="products-grid row products-grid--max-3-col last product_collection">
        @foreach ($product as $product)
            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-mobile-12 item">
                <div class="category-products-grid">
                    <div class="images-container">
                        <div class="product-hover">

                            <a href="{{ url('/product',$product->url) }}" title=""
                                class="product-image">
                                <img id="product-collection-image-8" class="img-responsive"
                                    src="{{ asset('uploads/products/' . $product->image) }}"
                                    style="height: 200px" alt="">
                            </a>
                        </div>
                        {{-- <div class="actions-no hover-box">
                            <div class="actions">
                                <button type="button" id="{{ $product->id }}" title="Add to Cart"
                                    class="button btn-cart pull-left" data-toggle="modal" data-target="#mymodal"><span><i
                                    class="icon-handbag icons"></i><span>Add to Cart</span></span></button>
                            </div>
                        </div> --}}
                    </div>
                    <div class="product-info products-textlink clearfix">
                        <h2 class="product-name"><a href="{{ url('/product', $product->url) }}"
                                title="{{ $product->name }}">{{ $product->name }}</a></h2>
                        <div class="price-box"> <span class="regular-price"> <span
                                    class="price">₹{{ $product->price }}</span> </span>
                        </div>
                        <div class="ratings">
                            <div class="desc std">
                                <p>{{ $product->discription }}</p>
                            </div>
                            {{-- <div class="rating-box">
                                <div class="rating" style="width:80%"></div>
                            </div> --}}

                            <span class="amount"><a href="#">1 Review(s)</a></span>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <!--- .products-grid-->
</div>




