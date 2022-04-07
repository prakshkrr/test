<div class="block-content">
    <p class="block-subtitle">added item(s)</p>
    <ol id="cart-sidebar" class="mini-products-list clearfix">
        @php
            $cartitems = showCartItems();
            $k=0;
        @endphp
        @if(isset($cartitems))
            @foreach($cartitems as $key=>$product)
                @if($key==3)
                    @break
                @endif
                <li class="item clearfix">
                    <div class="cart-content-top">
                        <a href="{{url('/',$product['access_url'])}}" title="{{$product['name']}}" class="product-image">
                            <img src="{{url('resources/assets/admin/images/products/'.$product['upc'].'/main_img.png')}}" width="60" height="77" alt="Brown Arrows Cushion">
                        </a>
                        <div class="product-details">
                            <p class="product-name">
                                <a href="{{url('/',$product['access_url'])}}" title="{{$product['name']}}">{{$product['name']}}</a>
                            </p>
                            <strong>{{$product['qty']}}</strong> x <span class="price">${{$product['qty'] * $product['price']}}</span>
                        </div>
                    </div>
                    @php
                        $k++;
                    @endphp
            @endforeach
        @endif
        @if($k==0)
            <div class="wish-list-notice" style="margin-bottom: 10px">
                <i class="fa-blank"></i>
                The Cart is Empty.
            </div>
        @endif
    </ol>
    {{--                                <p class="subtotal"> <span class="label">Subtotal:</span> <span class="price">$687.00</span></p>--}}
    <div class="actions"><a href="{{url('cart')}}" class="view-cart">View cart</a> {{--<a href="checkout-step1.html">Checkout</a>--}}</div>
</div>
