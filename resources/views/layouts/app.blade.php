<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
        <title>{{ config('app.name') }} - @yield('title')</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        @yield('meta')

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
        <!-- fontawesome -->
        <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <!-- owl carousel -->
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
        <!-- magnific popup -->
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <!-- animate css -->
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <!-- mean menu css -->
        <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
        <!-- main style -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <!-- responsive -->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        @yield('links')

        <!-- Custom Css -->

        @yield('style')
    </head>
<body>
      <?php
        $url = URL::current();
        $active = explode('/',$url);
        //  dd(url()->current());
        // $url = request()->route()->uri;
        $categorys = App\models\Category::all();
        if(auth()->check()){
            $cart_count = App\models\Cart::where('user_id',auth()->user()->id)->get();
        }


      ?>
      @yield('php')

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" @if (!isset($nav_color) )
            style="background-color: #051922;"
    @endif id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
                            <div class="site-logo">
                                <a href="{{ url('/') }}">
                                    <img width="75" height="75"src="{{ asset('img/logo2.png') }}" alt="{{ asset('img/logo2.png') }}">
                                </a>
                            </div>
                            <ul>
								<li class=""><a href="{{ route('home') }}">home</a>
									{{-- <ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul> --}}
								</li>
								<li><a href="about.html">About</a></li>
								<li><a href="#">Categories</a>
									<ul class="sub-menu">
                                        @foreach ( $categorys as $category )
										<li><a href="{{ route('get.category',$category->name) }}">{{ $category->name }}</a></li>
                                        @endforeach
									</ul>
								</li>
								{{-- <li><a href="news.html">News</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li> --}}
								<li><a href="{{ route('contact') }}">Contact</a></li>
								<li><a href="shop.html">Shop</a>
									<ul class="sub-menu">
										<li><a href="{{ route('show.cart') }}">Cart</a></li>
										<li><a href="{{ route('checkout') }}">Check Out</a></li>
									</ul>
								</li>
                                @if(auth()->check())

								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{ route('show.cart') }}"><i class="fas fa-shopping-cart"></i>
                                            <span @if ($cart_count->count() == 0) style='opacity:0' @endif class='cart-count'>{{ $cart_count->count() }}</span>


                                        </a>
                                        <a  href="#"><img height="40" width="40" class="rounded-circle img-thumbnail mr-2" src="https://ui-avatars.com/api/?name={{ auth()->user()->name  }}">{{ auth()->user()->name }}</a>
										{{-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> --}}
                                        <a onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                            href="{{ route('logout') }}" class="mega-menu"
                                            title="{{ __('LogOut') }}"><i class="fa-solid fa-right-from-bracket"></i>
                                        </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
									</div>
								</li>
                                @else
                                    @if ($active[3] != 'login')

                                    <li>
                                        <div class="header-icons">
                                            <a class="shopping-cart" href="{{ route('login') }}">Connecte <i class="fa fa-sign-in" aria-hidden="true"></i></a>

                                        </div>
                                    </li>
                                    @endif

                                @endif

							</ul>
						</nav>
						{{-- <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a> --}}
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>

  @yield('content')


	<!-- features list section -->
	{{-- <div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over $75</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3 days!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div> --}}
	<!-- end features list section -->
  	<!-- footer -->
	<div class="footer-area py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@fruitkha.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="{{ route('contact') }}">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
                    <h2 class="widget-title">Social Links</h2>
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 text-center">
					<p>Copyrights &copy; 2022 All Rights Reserved.<br>

					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- count down -->
	<script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
	<!-- isotope -->
	<script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
	<!-- waypoints -->
	<script src="{{ asset('assets/js/waypoints.js') }}"></script>
	<!-- owl carousel -->
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<!-- magnific popup -->
	<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
	<!-- mean menu -->
	<script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
	<!-- sticker js -->
	<script src="{{ asset('assets/js/sticker.js') }}"></script>
	<!-- main js -->
	<script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
