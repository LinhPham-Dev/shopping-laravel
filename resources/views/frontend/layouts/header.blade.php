<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="mailto: phamlinhaz229@gmail.com" class="welcome-msg">Email: phamlinhaz229@gmail.com</a>
            </div>
            <div class="header-right">
                <div class="dropdown">
                    <a href="#currency">USD</a>
                    <ul class="dropdown-box">
                        <li><a href="#USD">USD</a></li>
                        <li><a href="#EUR">EUR</a></li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <div class="dropdown ml-5">
                    <a href="#language">ENG</a>
                    <ul class="dropdown-box">
                        <li>
                            <a href="#USD">ENG</a>
                        </li>
                        <li>
                            <a href="#EUR">FRH</a>
                        </li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <span class="divider"></span>
                @if (Auth::check('user'))
                <span class="my-3">{{ Auth::user()->name }}</span>
                @else
                <a class="login-link" href="{{ route('ajax-login') }}" data-toggle="login-modal">
                    <i class="d-icon-user"></i>Sign in</a>
                <span class="delimiter">/</span>
                <a class="register-link ml-0" href="{{ route('ajax-login') }}" data-toggle="login-modal">Register</a>
                @endif
                <!-- End of Login -->
            </div>
        </div>
    </div>
    <!-- End HeaderTop -->
    <div class="header-middle sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{asset('asset-frontend')}}/images/logo.png" alt="logo" width="153" height="44" />
                </a>
                <!-- End Logo -->

                <div class="header-search hs-simple">
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search..."
                            required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
                <!-- End Header Search -->
            </div>
            <div class="header-right">
                <a href="tel:#" class="icon-box icon-box-side">
                    <div class="icon-box-icon mr-0 mr-lg-2">
                        <i class="d-icon-phone"></i>
                    </div>
                    <div class="icon-box-content d-lg-show">
                        <h4 class="icon-box-title">Call Us :</h4>
                        <p>(+84) 123-456-789</p>
                    </div>
                </a>
                <span class="divider"></span>
                <a href="" class="wishlist">
                    <i class="d-icon-heart"></i>
                </a>
                <span class="divider"></span>
                <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
                    <a href="" class="cart-toggle label-block link">
                        <i class="d-icon-bag"><span class="cart-count">2</span></i>
                    </a>
                    <div class="cart-overlay"></div>
                    <!-- End Cart Toggle -->
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <h4 class="cart-title">Shopping Cart</h4>
                            <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                    class="d-icon-arrow-right"></i><span class="sr-only">Cart</span></a>
                        </div>
                        <div class="products scrollable">
                            <div class="product product-cart">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{asset('asset-frontend')}}/images/cart/product-1.jpg" alt="product"
                                            width="80" height="88" />
                                    </a>
                                    <button class="btn btn-link btn-close">
                                        <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                    </button>
                                </figure>
                                <div class="product-detail">
                                    <a href="product.html" class="product-name">Riode White Trends</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">$21.00</span>
                                    </div>
                                </div>

                            </div>
                            <!-- End of Cart Product -->
                            <div class="product product-cart">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{asset('asset-frontend')}}/images/cart/product-2.jpg" alt="product"
                                            width="80" height="88" />
                                    </a>
                                    <button class="btn btn-link btn-close">
                                        <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                    </button>
                                </figure>
                                <div class="product-detail">
                                    <a href="product.html" class="product-name">Dark Blue Women’s
                                        Leomora Hat</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">$118.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Cart Product -->
                        </div>
                        <!-- End of Products  -->
                        <div class="cart-total">
                            <label>Subtotal:</label>
                            <span class="price">$139.00</span>
                        </div>
                        <!-- End of Cart Total -->
                        <div class="cart-action">
                            <a href="cart.html" class="btn btn-dark btn-link">View Cart</a>
                            <a href="checkout.html" class="btn btn-dark"><span>Go To Checkout</span></a>
                        </div>
                        <!-- End of Cart Action -->
                    </div>
                    <!-- End Dropdown Box -->
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom d-lg-show">
        <div class="container">
            <div style="margin: 0 auto" class="header-menu">
                <nav class="main-nav">
                    <ul class="menu">
                        <li class="active">
                            <a href="">Home</a>
                        </li>
                        <li>
                            <a href="">Products</a>
                        </li>
                        <li>
                            <a href="">Wishlist</a>
                        </li>
                        <li>
                            <a href="">Contact Us</a>
                        </li>
                        <li>
                            <a href="">Blogs</a>
                        </li>
                        <li>
                            <a href="">About Us</a>
                        </li>
                        <li><a href="">FAQs</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
