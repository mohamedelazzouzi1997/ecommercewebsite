@extends('layouts.app')


@section('title')
HajarFleur
@endsection

@section('links')

@endsection

@section('style')

@endsection

@section('php')
   @php
       $nav_color = true;
   @endphp
@endsection

@section('content')
	<!-- home page slider -->
	<div style="height:75%" class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1" style="background-image: url({{ asset('img/h1-rev-07.jpg') }})">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						{{-- <div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh & Organic</p>
								<h1>Delicious Seasonal Fruits</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">Fruit Collection</a>
									<a href="contact.html" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2" style="background-image: url({{ asset('img/h1-rev-06.jpg') }})">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						{{-- <div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh Everyday</p>
								<h1>100% Organic Collection</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">Visit Shop</a>
									<a href="contact.html" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3" style="background-image: url({{ asset('img/h1-rev-05.jpg') }})">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							{{-- <div class="hero-text-tablecell">
								<p class="subtitle">Mega Sale Going On!</p>
								<h1>Get December Discount</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">Visit Shop</a>
									<a href="contact.html" class="bordered-btn">Contact Us</a>
								</div>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->
	<!-- product section -->
	<div class="product-section mt-80 mb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
                @foreach ( $products as $product )

				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="{{ route('show.product',$product->id) }}"><img height="300" src="{{ asset('img/'.$product->img) }}" alt="{{ $product->img }}"></a>
						</div>
						<h3>{{ $product->name }}</h3>
						<p class="product-price"><span>{{ $product->description }}</span> {{ $product->price }} DH</p>
                        @if (auth()->check())
                            @if ($cart->where('product_id', $product->id)->count())
                                <a style='background-color: #ff9930' href="#" onclick="return false;" class="cart-btn"><i class="fas fa-shopping-cart"></i> le produit deja au panier</a>

                            @else
                                <a href="{{ route('add.cart', $product->id) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>

                            @endif

                        @else
                            <a href="{{ route('add.cart', $product->id) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                        @endif

					</div>
				</div>
                @endforeach

			</div>
		</div>
	</div>
	<!-- end product section -->

    	<!-- logo carousel -->
            {{-- <div class="logo-carousel-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="logo-carousel-inner">
                                <div class="single-logo-item">
                                    <img src="assets/img/company-logos/1.png" alt="">
                                </div>
                                 <div class="single-logo-item">
                                    <img src="assets/img/company-logos/2.png" alt="">
                                </div>
                                <div class="single-logo-item">
                                    <img src="assets/img/company-logos/3.png" alt="">
                                </div>
                                <div class="single-logo-item">
                                    <img src="assets/img/company-logos/4.png" alt="">
                                </div>
                                <div class="single-logo-item">
                                    <img src="assets/img/company-logos/5.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
	<!-- end logo carousel -->
@endsection

@section('scripts')

@endsection
