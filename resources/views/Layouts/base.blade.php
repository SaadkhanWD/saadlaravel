<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href= "{{asset ('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href= "{{asset ('css/magnific-popup.css') }}">
    <link rel="stylesheet" href= "{{asset ('css/jquery-ui.css') }}">
    <link rel="stylesheet" href= "{{asset ('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href= "{{asset ('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style2.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    
    @livewireStyles
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left mt-2">
              @livewire('header-search-component')
            </div>
            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="/" class="js-logo-clone">Shoppers</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                  @if(Route::has('login'))
                     @auth
                       @if(Auth::user()->utype === 'ADM')
                       <li><a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon icon-person "></span></a>
                       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                       <a class="dropdown-item disabled">Welcome {{Auth::user()->name}}</a>
                       <a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a>
                       <a class="dropdown-item" href="{{route('admin.categories')}}"> All Categories</a>
                       <a class="dropdown-item" href="{{route('admin.products')}}">All Products</a>
                       <a class="dropdown-item" href="{{route('admin.homeslider')}}">Manage Home Slider</a>
                       <a class="dropdown-item" href="{{route('admin.coupons')}}">Manage Coupons</a>
                       <a class="dropdown-item" href="{{route('admin.orders')}}">All Orders</a>
                       </div>
                       </li>
                       @else
                       <li><a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon icon-person "></span></a>
                       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                       <a class="dropdown-item disabled">Welcome {{Auth::user()->name}}</a>
                       <a class="dropdown-item" href="{{route('user.dashboard')}}">Dashboard</a>
                       <a class="dropdown-item" href="{{route('user.orders')}}">My Orders</a>
                       </div>
                       </li>
                       @endif
                     @endif 
                  @endif            
                  <li>
                    @livewire('wishlist-count-component')
                  </li>
                  <li>
                    @livewire('cart-count-component')
                  </li> 
                </ul>
              </div> 
            </div>
          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="/">Home</a>
              <!--<ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
                <li class="has-children">
                  <a href="#">Sub Menu</a>
                  <ul class="dropdown">
                  <li><a href="#">Menu One</a></li>
                  <li><a href="#">Menu Two</a></li>
                  <li><a href="#">Menu Three</a></li>
                  </ul>
                  
                </li>
              </ul>-->
            </li>
            <li><a href="/shop">Shop</a></li>
            <li class="has-children">
              @livewire('catalogue-component')
            </li>
            <li><a href="/contact">Contact</a></li>
            @if(Route::has('login'))
            @auth
            <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" method="POST" action="{{route('logout')}}">
            @csrf
            </form>
            @else
            <li class="has-children">
              <a href="#">Login/Register</a>
              <ul class="dropdown">
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Register</a></li>
              </ul>
            </li>
            @endif
            @endif
          </ul>
        </div>
      </nav>
    </header>

    {{$slot}}

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="/checkout">Checkout</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="{{asset('images/hero_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding Your Perfect Shoes</h3>
              <p>Promo from  nuary 15 mdash 25, 2019</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset ('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset ('js/jquery-ui.js')}}"></script>
  <script src="{{ asset ('js/popper.min.js')}}"></script>
  <script src="{{ asset ('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset ('js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset ('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset ('js/aos.js')}}"></script>
  <script src="{{ asset ('js/functions.js')}}"></script>
  <script src="{{ asset ('js/main.js')}}"></script>
  <script src="{{ mix('js/app.js') }}" defer></script>
  @livewireScripts
  @stack('scripts')
  </body>
</html>
