@extends('layouts.app')


@section('title')
HajarFleur
@endsection

@section('links')

@endsection

@section('style')

@endsection



@section('content')


	<!-- cart -->
	<div class="cart-section mt-150 mb-150" style="margin-top:200px">
		<div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Produit Image</th>
									<th class="product-name">Nom</th>
									<th class="product-price">Prix</th>
									<th class="product-quantity">Quantité</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
                                  <?php

                                     $total = 0;
                                ?>
                                @foreach ($items as $item)
                                <?php
                                     $product = App\models\Product::find($item->product_id);
                                     $total += $product->price * $item->qty;
                                ?>

								<tr class="table-body-row">
									<td class="product-remove"><a href="{{ route('delete.cart',$item->id) }}"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img width="100" height='125' class="img-thumbnail" src="{{ asset('img/'.$product->img) }}" alt="{{ $product->img }}"></td>
									<td class="product-name">{{ $product->name }}</td>
									<td class="product-price">{{ $product->price }}</td>
									<td class="product-quantity">
                                        <form action="{{ route('update.cart',$item->id) }}" method="post">
                                            @method('put')
                                            @csrf
                                            <input type="number" name="qty" min='1' value="{{ $item->qty }}">
                                            <button type="submit" class="btn btn-link"><i class="fa fa-refresh"></i></button>
                                        </form>
                                    </td>
									<td class="product-total">{{ $product->price * $item->qty }} DH</td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>{{ $total }}DH</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>35dh</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>{{ $total + 35 }} DH</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							{{-- <a href="cart.html" class="boxed-btn">Update Cart</a> --}}
							<a href="{{ route('checkout') }}" class="boxed-btn black">Check Out</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->


@endsection

@section('scripts')

@endsection
