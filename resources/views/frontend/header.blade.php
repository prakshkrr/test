<div class="wrapper">
    <div class="page">
        <div class="header-container header-color color">
            <div class="header_full">
                <div class="header">
                    <div class="header-logo show-992">
                        <a href="index.html" class="logo"> <img class="img-responsive"
                                src="assets/images/logo.png" alt="" /></a>
                    </div>
                    <!--- .header-logo -->
                    <div class="header-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="header-config-bg">
                                    <div class="header-wrapper-bottom">
                                        <div class="custom-menu col-lg-12">
                                            {{-- <div class="header-logo hidden-992">
                                                <a href="index.html" class="logo"> <img class="img-responsive"
                                                        src="assets/images/logo.png" alt="" /></a>
                                            </div> --}}
                                            <!--- .header-logo -->
                                            <div class="magicmenu clearfix">
                                                <ul class="nav-desktop sticker">
                                                    <li class="level0 logo display"><a class="level-top"
                                                            href="index.html"><img alt="logo"
                                                                src="assets/images/logo.png"></a></li>
                                                    <li class="level0 home">
                                                        <a class="level-top" href="/"><span
                                                                class="icon-home fa fa-home"></span><span
                                                                class="icon-text">Home</span></a>
                                                    </li>
                                                    <li class="level0 home">
                                                        <a class="level-top" href="/products"><span
                                                                class="icon-home fa fa-home"></span><span
                                                                class="icon-text">Product</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!--- .magicmenu -->

                                            <!--- .nav-mobile -->
                                        </div>
                                        <!--- .custom-menu -->
                                    </div>
                                    <!--- .header-wrapper-bottom -->
                                </div>
                                <!--- .header-config-bg -->
                            </div>
                            <!--- .row -->
                        </div>
                        <!--- .container -->
                    </div>
                    <!--- .header-bottom -->
                    <div class="header-page clearfix">
                        <div class="header-setting header-search">
                            <div class="settting-switcher">
                                <div class="dropdown-toggle">
                                    <div class="icon-setting"><i class="icon-magnifier icons"></i></div>
                                </div>
                                <div class="dispaly-seach dropdown-switcher">
                                    <form id="search_mini_form" action="#" method="get">
                                        <div class="form-search clearfix">
                                            <input id="catsearch" type="hidden" name="cat" />
                                            <input id="search" type="text" name="q" class="input-text"
                                                placeholder="Search ..." />
                                            <select class="ddslick" id="cat" name="cat">
                                                <option value="">Categories</option>
                                            </select>
                                            <button type="submit" title="Search" class="button"><span><span><i
                                                            class="icon-magnifier icons"></i></span></span></button>
                                        </div>
                                        <!--- .form-search -->
                                    </form>
                                    <!--- #search_mini_form -->
                                </div>
                            </div>
                        </div>
                        <!--- .header-search -->
                        <div class="header-setting">
                            <div class="settting-switcher">
                                <div class="dropdown-toggle">
                                    <div class="icon-setting"><i class="icon-settings icons"></i></div>
                                </div>
                                <div class="dropdown-switcher">
                                    <div class="top-links-alo">
                                        <div class="header-top-link">
                                            <ul class="links">
                                                {{-- <li><a href="#" title="My Account">My Account</a></li> --}}
                                                {{-- <li><a href="#" title="My Cart">My Cart</a></li> --}}
                                                {{-- <li><a href="checkout-step1.html" title="Checkout" --}}
                                                        {{-- class="top-link-checkout">Checkout</a></li> --}}
                                                        @if (Auth::check())

                                                            <li class="last"><a href="{{ url('/myorder') }}"
                                                                title="my order">My Order</a>

                                                            </li>
                                                        
                                                            <li class="last"><a href="{{ route('logout') }}"
                                                                title="Log Out" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form>
                                                            </li>
                                                        
                                                        @else
                                                         
                                                            <li class=" last"><a href="{{ url('/login') }}"
                                                                title="Log In">Log In</a>
                                                        </li>
                                                          
                                                        @endif
                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <!--- .top-links-alo -->
                                </div>
                                <!--- .dropdown-switcher -->
                            </div>
                            <!--- .settting-switcher -->
                        </div>
                        <!--- .header-setting -->
                        <div class="miniCartWrap">
                            <div class="mini-maincart">
                                <div class="cartSummary">
                                    <div class="crat-icon">
                                        <span class="icon-handbag icons"></span>
                                        <p class="mt-cart-title">My Cart</p>
                                    </div>
                                    <div class="cart-header">
                                        <span class="zero">0 </span>
                                        <p class="cart-tolatl">
                                            <span class="toltal">Total:</span>
                                            <span><span class="price">$0.00</span></span>
                                        </p>
                                    </div>
                                </div>
                                <!--- .cartSummary -->
                                <div class="mini-contentCart" style="display: none">
                                    <div class="block-content">
                                        <p class="block-subtitle">Recently added item(s)</p>


                                        <div class="actions"> <a href="{{ url('/cart') }}"
                                                class="view-cart"> View cart
                                            </a> <a href="{{url ('/billing') }}">Checkout</a></div>
                                    </div>
                                </div>
                                <!--- .mini-contentCart -->
                            </div>
                            <!--- .mini-maincart -->
                        </div>
                        <!--- .miniCartWrap -->

                    </div>
                    <!--- .header-page -->
                </div>
                <!--- .header -->
            </div>
            <!--- .header_full -->
        </div>
        <!--- .header-container -->