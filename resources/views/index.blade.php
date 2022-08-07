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
                        <input class='product_id'  type="hidden" id="product_id" value="{{ $product->id }}">
						<p class="product-price"><span>{{ $product->description }}</span> {{ $product->price }} DH</p>
                        @if (auth()->check())
                            @if ($cart->where('product_id', $product->id)->count())
                                <a style='background-color: #ff9930' href="#" onclick="return false;" class="cart-btn"><i class="fas fa-shopping-cart"></i> le produit deja au panier</a>

                            @else
                                <a id='{{ $product->id }}' onclick="addtocart({{ $product->id }})" class="cart-btn"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>

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

@endsection

@section('scripts')
<script type="text/javascript">



        function addtocart(product_id){
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                method: "POST",
                url: "/addProductToCartajax",
                data: {
                    "product_id":product_id,
                    },
                success: function (data) {
                    var p = $("#"+product_id);
                    var cart_count = $('.cart-count').text();
                    if(p.text() != 'le produit deja au panier'){
                        $('.cart-count').html(parseInt(cart_count) + 1);
                        $('.cart-count').css('opacity','1');
                    }
                    p.queue(function() {
                    p.html('le produit deja au panier');
                    p.css("background-color", "#ff9930");
                    });

                }
                })
        }

</script>
@endsection
