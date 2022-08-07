@extends('layouts.app')


@section('title')
HajarFleur
@endsection

@section('links')

@endsection

@section('style')

@endsection



@section('content')
	<!-- single product -->
	<div class="single-product mt-150 mb-150" style="margin-top: 200px">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ asset('img/'.$product->img) }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{ $product->name }}</h3>
						<p class="single-product-pricing"><span></span>{{ $product->price }} DH</p>
						<p>{{ $product->description }}</p>
						<div class="single-product-form">

							<input id="qty" class="d-block" type="number" min="1" max="{{ $product->qty }}" value="1">

                            @if ($cart->where('product_id', $product->id)->count())
                                <a style='background-color: #ff9930' href="#" onclick="return false;" class="cart-btn"><i class="fas fa-shopping-cart"></i> le produit deja au panier</a>

                            @else
                                <a id='{{ $product->id }}' onclick="addtocart({{ $product->id }})" class="cart-btn"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>

                            @endif
							<p class="text-danger"><strong class="text-muted">Categories: </strong>{{ $product_category->name }}</p>
						</div>
						{{-- <h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach ( $product_by_same_categorys as $product_by_same_category )

				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="{{ route('show.product',$product_by_same_category->id) }}"><img src="{{ asset('img/'.$product_by_same_category->img) }}" alt=""></a>
						</div>
						<h3>{{ $product_by_same_category->name }}</h3>
						<p class="product-price">{{ $product_by_same_category->price }} DH </p>
						@if ($cart->where('product_id', $product_by_same_category->id)->count())
                                <a style='background-color: #ff9930' href="#" onclick="return false;" class="cart-btn"><i class="fas fa-shopping-cart"></i> le produit deja au panier</a>

                        @else
                                <a id='{{ $product_by_same_category->id }}' onclick="addtocart({{ $product_by_same_category->id }})" class="cart-btn"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>

                        @endif
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>
	<!-- end more products -->
@endsection

@section('scripts')
<script type="text/javascript">



        function addtocart(product_id){
            qty = $('#qty').val();

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
                    "qty": qty,
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
