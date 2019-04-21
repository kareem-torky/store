@extends('front.main')

@section('content')



<!-- BANNER AREA STRAT -->
		<section class="bannerhead-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner-heading">
							<h1>@lang('frontSite.shoppingCart')</h1>
						</div>
					</div>
				</div>
			</div>
		</section>

		@if(\Cart::getTotalQuantity())

		<!-- BANNER AREA END -->
		<!-- SHOPING CART AREA START -->
		<section class="shoping-cart-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<form method="post" action="{{route('front.post.cart.update')}}">
							@csrf
						<div class="wishlist-table-area table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product-remove">Remove</th>
										<th class="product-image">Image</th>
										<th class="product-name">Product Name</th>
										<th class="product-unit-price">Unit Price</th>
										<th class="product-quantity">Quantity</th>
										<th class="product-subtotal">Subtotal</th>
									</tr>
								</thead>
								<tbody>
											
									@foreach(\Cart::getContent() as $cart)
									<tr>
										<td class="product-remove">
											<a href="{{route('front.get.cart.delete',[$cart->id])}}" class="itemcartRemove" >
												<i class="fa fa-trash-o"></i>
											</a>
										</td>
										<td class="product-image">
											<a href="{{route('front.get.product.show',[$cart->attributes->catSlug,$cart->attributes->subCatslug,$cart->attributes->slug])}}">
												<img alt="{{$cart->name}}" src="{{getImage(PRODUCT_PATH.'small/'.$cart->attributes->img)}}" style="height: 150px; width: 130px;">
											</a>
										</td>
										<td class="product-name">
											<h3>
												<a href="{{route('front.get.product.show',[$cart->attributes->catSlug,$cart->attributes->subCatslug,$cart->attributes->slug])}}">
													{{$cart->name}}
												</a>
											</h3>
										</td>
										<td class="product-unit-price">
											<p>  $ {{$cart->price}}  </p>
										</td>
										<td class="product-quantity product-cart-details">
											<input type="number" value="{{$cart->quantity}}" min="1" name="qunt[]">
											<input type="hidden" name="prodCart[]" value="{{$cart->id}}" >
										</td>
										<td class="product-quantity">
											<p>$ {{$cart->price * $cart->quantity}}</p>
										</td>
									</tr>
									@endforeach
											
								
								</tbody>
							</table>
									
						</div>
						<div class="shopingcart-bottom-area">
							<a href="{{route('front.get.home.index')}}" class="bottoma">CONTINUE SHOPPING</a>
							<div class="bottom-button">
								<a href="{{route('front.get.cart.clear')}}" class="bottomb">CLEAR SHOPPING CART</a>
								<button type="submit" class="bottomb update-cart-btn">UPDATE SHOPPING CART</button>
							</div>
						</div>
						</form>


					</div>
				</div>
			</div>
		</section>
		<!-- SHOPING CART AREA END -->
		<!-- DISCOUNT SUBTOTAL AREA STRAT -->
		<section class="discount-area">
			<div class="container">
				<div class="row">
					<!-- <div class="col-md-6 res-mr-btm xs-res-mrbtm">
						<div class="discount-main-area">
							<div class="discount-top">
								<h3>DISCOUNT CODE</h3>
								<p>Enter your coupon code if have one</p>
							</div>
							<div class="discount-middle">
								<input type="text" placeholder=""/>
								<a href="#" class="">APPLY COUPON</a>
							</div>
						</div>
					</div> -->
					<div class="col-md-12">
						<div class="subtotal-main-area">
							<div class="subtotal-area">
								<h2>SUBTOTAL<span>$ {{ \Cart::getSubTotal() }}</span></h2>
							</div>
							<div class="subtotal-area">
								<!-- <h2>GRAND TOTAL<span>$ 200</span></h2> -->
							</div>
							<a href="{{route('front.get.order.checkout')}}">@lang('frontSite.checkout')</a>
							<!-- <p>Checkout With Multiple Addresses</p> -->
						</div>
					</div>
				</div>
			</div>
		</section>


		@else
										
			<h3 class="alert alert-danger text-center">@lang('frontSite.dataNotFound')</h3>

		@endif
		<!-- DISCOUNT SUBTOTAL AREA END -->



@endsection

