<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            @auth 
                                @if(Auth::user()->role=='admin')
                                    <li><i class="fa fa-truck"></i> <a href="{{route('order.track')}}">Track Order</a></li>
                                    <li><i class="ti-user"></i> <a href="{{route('admin')}}" target="_blank">Dashboard</a></li>
                                @else 
                                    <li><i class="fa fa-truck"></i> <a href="{{route('order.track')}}">Track Order</a></li>
                                    <li><i class="ti-user"></i> <a href="{{route('user')}}" target="_blank">Dashboard</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="mobile-nav"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">    
                                    <div class="nav-inner">
                                        <div class="logo">
                                            @php
                                                $settings = DB::table('settings')->first();
                                            @endphp
                                            <a href="{{ route('home') }}">
                                                <img src="{{ $settings && $settings->logo ? asset($settings->logo) : asset('default-logo.png') }}" 
                                                     alt="logo" 
                                                     class="logo-default"
                                                     style="height:30px; max-width:100px;">
                                                <img src="{{ $settings && $settings->logo2 ? asset($settings->logo2) : asset('default-logo2.png') }}" 
                                                     alt="logo scrolled" 
                                                     class="logo-scrolled"
                                                     style="height:30px; max-width:100px; display:none;">
                                            </a>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var defaultLogo = document.querySelector('.logo-default');
                                                var scrolledLogo = document.querySelector('.logo-scrolled');
                                                window.addEventListener('scroll', function() {
                                                    if(window.scrollY > 50) {
                                                        if(defaultLogo) defaultLogo.style.display = 'none';
                                                        if(scrolledLogo) scrolledLogo.style.display = 'inline';
                                                    } else {
                                                        if(defaultLogo) defaultLogo.style.display = 'inline';
                                                        if(scrolledLogo) scrolledLogo.style.display = 'none';
                                                    }
                                                });
                                            });
                                        </script>
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">Home</a></li>
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">About Us</a></li>
                                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists') active @endif">
                                                <a href="{{route('product-grids')}}">Products</a><span class="new">New</span>
                                            </li>                                                
                                            {{Helper::getHeaderCategory()}}                                
                                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">Contact Us</a></li>

                                            <li class="search-bar">
                                                <form method="POST" action="{{route('product.search')}}">
                                                    @csrf
                                                    <input name="search" placeholder="Search Products Here....." type="search">
                                                    <button class="btnn" type="submit"><i class="ti-search"></i></button>
                                                </form>
                                            </li>
<!-- Wishlist -->
<li>
    <div class="sinlge-bar shopping">
        <a href="{{route('wishlist')}}" class="single-icon">
            <i class="fa fa-heart-o"></i>
            <span class="total-count">{{Helper::wishlistCount()}}</span>
        </a>
        @auth
        <div class="shopping-item">
            <div class="dropdown-cart-header">
                <span>{{count(Helper::getAllProductFromWishlist())}} Items</span>
                <a href="{{route('wishlist')}}">View Wishlist</a>
            </div>
            <div class="scrollable-list">
                <ul class="shopping-list">
                    @foreach(Helper::getAllProductFromWishlist() as $data)
                        @php $photo = explode(',', $data->product['photo']); @endphp
                        <li>
                            <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item">
                                <i class="fa fa-times"></i>
                            </a>
                            <div class="cart-img">
                                <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                            </div>
                            <div class="product-info">
                                <h4>
                                    <a href="{{route('product-detail',$data->product['slug'])}}" style="background: none !important; color: #333;">
                                        {{$data->product['title']}}
                                    </a>
                                </h4>
                                <div class="quantity-price">
                                    <span class="quantity">{{$data->quantity}} x ${{number_format($data->price,2)}}</span>
                                </div>
                                <div class="final-price-row">
                                    <span class="final-price">${{number_format($data->quantity * $data->price, 2)}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="bottom">
                <div class="total">
                    <span>Total:</span>
                    <span class="total-amount">${{number_format(Helper::totalWishlistPrice(),2)}}</span>
                </div>
                <a href="{{route('cart')}}" class="btn checkout-btn">View Cart</a>
            </div>
        </div>
        @endauth
    </div>
</li>

<!-- Cart -->
<li>
    <div class="sinlge-bar shopping">
        <a href="{{route('cart')}}" class="single-icon">
            <i class="ti-bag"></i>
            <span class="total-count">{{Helper::cartCount()}}</span>
        </a>
        @auth
        <div class="shopping-item">
            <div class="dropdown-cart-header">
                <span>{{count(Helper::getAllProductFromCart())}} Items</span>
                <a href="{{route('cart')}}">View Cart</a>
            </div>
            <div class="scrollable-list">
                <ul class="shopping-list">
                    @foreach(Helper::getAllProductFromCart() as $data)
                        @php $photo = explode(',', $data->product['photo']); @endphp
                        <li>
                            <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item">
                                <i class="fa fa-times"></i>
                            </a>
                            <div class="cart-img">
                                <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                            </div>
                            <div class="product-info">
                                <h4>{{$data->product['title']}}</h4>
                                <div class="quantity-price">
                                    <span class="quantity">{{$data->quantity}} x ${{number_format($data->price,2)}}</span>
                                </div>
                                <div class="final-price-row">
                                    <span class="final-price">${{number_format($data->quantity * $data->price, 2)}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="bottom">
                <div class="total">
                    <span>Total:</span>
                    <span class="total-amount">${{number_format(Helper::totalCartPrice(),2)}}</span>
                </div>
                <a href="{{route('checkout')}}" class="btn checkout-btn">Checkout</a>
            </div>
        </div>
        @endauth
    </div>
</li>

@auth
    <li><a href="{{route('user.logout')}}">Logout</a></li>
@else
    <li><a href="{{route('login.form')}}">Login</a></li>
    <li><a href="{{route('register.form')}}">Register</a></li>
@endauth
    <!--/ End Header Inner -->
</header>
@push('styles')
<style>
/* Wishlist & Cart Dropdown Styles */
.sinlge-bar.shopping {
    position: relative;
    display: inline-block;
    margin: 0 10px;
    padding: 5px 0;
}

/* Shared Dropdown Container */
.shopping-item {
    position: absolute;
    right: 0;
    top: 100%;
    width: 350px;
    background: #fff;
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
    border-radius: 8px;
    z-index: 1000;
    display: none;
    overflow: hidden; /* Added */
}

.sinlge-bar.shopping:hover .shopping-item {
    display: block;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Scrollable List Container */
.scrollable-list {
    max-height: 300px;
    overflow-y: auto;
    padding: 0 15px;
}

/* Header */
.dropdown-cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    border-bottom: 1px solid #f0f0f0;
    position: sticky;
    top: 0;
    background: white;
    z-index: 2;
}

/* Product List */
.shopping-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.shopping-list li {
    display: flex;
    align-items: flex-start;
    padding: 15px 0 15px 35px; /* Updated to leave space for remove icon */
    border-bottom: 1px solid #f5f5f5;
    position: relative;
}

/* Remove Button */
.remove {
    position: absolute;
    left: 5px; /* Visible on the left */
    top: 20px; /* Aligned vertically */
    color: #ff4d4d;
    font-size: 16px;
    opacity: 0.7;
    transition: all 0.2s;
    z-index: 2;
    cursor: pointer;
}

.remove:hover {
    opacity: 1;
    transform: scale(1.1);
}

/* Product Image */
.cart-img {
    flex: 0 0 60px;
    height: 60px;
    margin-right: 15px;
    overflow: hidden;
    border-radius: 4px;
}

.cart-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Product Info */
.product-info {
    flex: 1;
    min-width: 0;
    display: flex; /* Make vertical layout */
    flex-direction: column;
    justify-content: space-between; /* Push price to bottom */
}

.product-info h4 {
    margin: 0 0 6px 0;
    font-size: 14px;
    font-weight: 600;
    color: #333;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.product-info h4 a {
    background: none !important; /* Remove black background */
    color: #333;
    text-decoration: none;
}

.quantity-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.quantity-price {
    font-size: 13px;
    color: #666;
}

.final-price-row {
    margin-top: 8px;
}

.final-price {
    font-weight: 700;
    color: #e63946;
    font-size: 14px;
}

/* Footer */
.bottom {
    padding: 15px 20px;
    border-top: 1px solid #eee;
    position: sticky;
    bottom: 0;
    background: white;
    z-index: 2;
}
.scrollable-list {
    max-height: 300px;
    overflow-y: auto;
    padding: 0 15px;
    scrollbar-width: thin;
    scrollbar-color: #c1c1c1 #f1f1f1;
}
.scrollable-list::-webkit-scrollbar {
    width: 6px;
}
.scrollable-list::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}
.scrollable-list::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 10px;
}
.scrollable-list::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
.bottom .total {
    display: flex;
    justify-content: space-between;
    font-weight: 600;
    color: #333;
}
</style>
@endpush
