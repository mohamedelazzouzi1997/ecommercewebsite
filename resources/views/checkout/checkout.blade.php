@extends('layouts.app')


@section('title')
HajarFleur
@endsection

@section('links')

@endsection

@section('style')

@endsection



@section('content')

	<!-- check out section -->

	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif

					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>
						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="{{ route('order') }}" method="post" enctype="multipart/form">
						        		@csrf
                                        <p><input type="text" name="name" placeholder="Name" value="{{ auth()->user()->name }}"></p>
						        		<p><input type="text" name="adress" placeholder="Address" value="{{ auth()->user()->adress }}"></p>
						        		<p><input type="tel" name="phone" placeholder="Phone" value="{{ auth()->user()->phone }}"></p>
                                        <p><select name='city' class="form-control form-control-lg">
                                            <option value="marrakech">Marrakech</option>
                                            <option value="casa">Casa</option>
                                            <option value="tanger">Tanger</option>
                                            <option value="agadir">Agadir</option>
                                        </select></p>
                                        <button class="btn btn-success btn-block">Order</button>
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Your order Details</th>
                                    <th>quntité</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($items as $item)
                                @php

                                    $product = $products->where('id',$item->product_id)->first();
                                    $total += $product->price * $item->qty ;
                                @endphp
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $product->price * $item->qty }} DH</td>
                                    </tr>
                                @endforeach
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td colspan="2">Shipping</td>
									<td>35DH</td>
								</tr>
								<tr>
									<td colspan="2">Total</td>
									<td>{{ $total + 35 }} DH</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->
@endsection

@section('scripts')

@endsection
