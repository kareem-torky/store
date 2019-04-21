	<!-- MENU AREA START -->
    <div class="menu-area">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-2">
						<div class="logo-area">
							<a href="{{route('front.get.home.index')}}"><img src="{{furl()}}/img/home-1/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 col-sm-8">
						<div class="main-menu">
							<ul class="list-inline">
							<li class="{{active_link('')}}"><a href="{{route('front.get.home.index')}}">Home</a></li>

							 @foreach($categories as $cat)
							  <li class="{{active_link($cat->slug,3)}}" ><a href="{{route('front.get.product.category',[$cat->slug])}}">{{ $cat->name }} </a>
								<!-- Mega Menu Four Column -->
								<div class="mega-menu">

									@foreach($cat->sub() as $sub)
									<span>
										<a href="{{route('front.get.product.subCategory',[$cat->slug,$sub->slug])}}" class="mega-title">{{\Str::Words($sub->name,'3','')}}</a>
										@foreach($sub->productMenu() as $prod)
										<a href="{{route('front.get.product.show',[$cat->slug,$sub->slug,$prod->slug])}}">
											{{\Str::Words($prod->name,'3','')}}
										</a>
										@endforeach
									</span>
									@endforeach
									<span class="mega-menu-img">
										<a href="{{route('front.get.product.category',[$cat->slug])}}">
											<img alt="{{$cat->name}}" src="{{getImage(CATEGORY_PATH.'small/'.$cat->img)}}">
										</a>
									</span>
								</div>
							  </li>
								@endforeach
							  
							  <li class="{{active_link('about')}}"><a href="{{route('front.get.home.about')}}">About</a></li>
							  <li class="{{active_link('contact-us')}}"><a href="{{route('front.get.contactus.contact')}}">Contact</a></li>
							</ul>
						</div>
					</div>
					<!-- MOBILE-MENU-AREA START --> 
					<div class="mobile-menu-area">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
								<div class="mobile-area">
									<div class="mobile-menu">
										<nav id="mobile-nav">
											<ul>
												<li class="{{active_link('')}}">
													<a href="{{route('front.get.home.index')}}">Home</a>
												</li>
												@foreach($categories as $cat)
												<li><a href="{{route('front.get.product.category',[$cat->slug])}}">{{ $cat->name }} </a>
													<ul>
														@foreach($cat->sub() as $sub)
														<a href="{{route('front.get.product.subCategory',[$cat->slug,$sub->slug])}}" class="mega-title">{{\Str::Words($sub->name,'3','')}}</a>
														@endforeach
														
													</ul>
												</li>
												@endforeach
												<li class="{{active_link('about')}}"><a href="{{route('front.get.home.about')}}">About</a></li>
							  					<li class="{{active_link('contact-us')}}"><a href="{{route('front.get.contactus.contact')}}">Contact</a></li>
											</ul>
										</nav>
									</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- MOBILE-MENU-AREA END  -->
					<div class="col-md-2 col-sm-2">
						<div class="menu-right-area">
							<ul>
								<li>
									<a href="#" class="cart-toggler search-icon">
										<i class="fa fa-search"></i>
									</a>
									<div class="header-bottom-search">
										<form method="POST" action="#" class="search-box">
											<div>
												<input type="text" autocomplete="off" placeholder="Search" value="">
											</div>
										</form>						            
									</div>
								</li>
								<li>
									<a href="#" class="cart-toggler mini-cart-icon " id="qCart">
										<i class="fa fa-shopping-cart"></i>
										{{--\Cart::clear()--}}
										<span>{{\Cart::getTotalQuantity()}}</span>
									</a>
									<div class="top-cart-content">
								
										<div id="cart-content">
											@if(\Cart::getTotalQuantity())
											
											@foreach(\Cart::getContent() as $cart)
											<div class="media header-middle-checkout">
												<div class="media-left check-img">
														<a href="{{route('front.get.product.show',[$cart->attributes->catSlug,$cart->attributes->subCatslug,$cart->attributes->slug])}}">
															<img alt="{{$cart->name}}" src="{{getImage(PRODUCT_PATH.$cart->attributes->img)}}" style="width: 70px; height: 70px;">
														</a>
													</div>
													<div class="media-body checkout-content">
														<h4 class="media-heading">
															<a href="{{route('front.get.product.show',[$cart->attributes->catSlug,$cart->attributes->subCatslug,$cart->attributes->slug])}}">{{\Str::Words($cart->name,2,'')}}</a>
															<span title="Remove This Item" class="btn-remove checkout-remove itemcartRemove" data-CartId="{{$cart->id}}" > 
																<i class="fa fa-trash"></i>
															</span>
														</h4>
														<p>1 x {{$cart->price}}</p>
													</div>
											</div>
											@endforeach
											
											@endif
										</div>

										<div class="actions">
											<a  href="{{route('front.get.cart.show')}}"  title="cart-botton" class="cart-button pointer">
												@lang('frontSite.showCart')
											</a>
										</div>
										
										
									</div>

								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- MENU AREA END -->