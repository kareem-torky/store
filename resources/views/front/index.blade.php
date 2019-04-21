@extends('front.main')


@section('content')




		<!-- SLIDER AREA START -->
		<section class="slider-area-main">
			<!-- slider -->
			<div class="slider-area">
				<div class="bend niceties preview-1">



					
					<div id="ensign-nivoslider-3" class="slides">	
						@foreach($slider as $sl)
						<img src="{{getImage(SLIDER_PATH.$sl->img)}}" alt="{{$sl->name}}" title="#slider-direction-{{$sl->id}}"  />
						@endforeach
					</div>
					<!-- direction 1 -->
					@foreach($slider as $sl)
					<div id="slider-direction-{{$sl->id}}" class="t-cn slider-direction">
						<div class="slider-content t-lfl s-tb slider-1"">
							<div class="title-container s-tb-c">
								<h1 class="title1"> {{ \Str::Words($sl->name,4,'') }} </h1>
								<p class="title1">{{ \Str::Words($sl->description,30,'') }}</p>
								@if($sl->link)
								<h3 class="title3 btn-slider"><a href="{{$sl->link}}">@lang('frontSite.shopNow')</a></h3>
								@endif
							</div>
						</div>
					</div>
					@endforeach






				</div>
			</div>
			<!-- slider end-->
		</section>
		<!-- SLIDER AREA END -->
		<!-- BANNER AREA START -->
		<section class="banner-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 xs-res-mrbtm">
						<div class="banner-left">
							<a class="promo-link" href="#">
								<img src="{{furl()}}/img/home-1/banner-1.jpg" alt="" />
								<h1>MEN’S COLLECTION</h1>
								<span class="promo-hover"></span>
							</a>
						</div>
					</div>
					
			

					
					<div class="col-md-3 col-sm-3">
						<div class="banner-left-side">
							<a class="mr-btm promo-link" href="#">
								<img src="{{furl()}}/img/home-1/banner-2.jpg" alt="" />
								<h1>NEW COLLECTION</h1>
								<span class="sl-btn">SALE</span>
								<div class="promo-hover"></div>
							</a>
							<a class="promo-link xs-res-mrbtm" href="#">
								<img src="{{furl()}}/img/home-1/banner-3.jpg" alt="" />
								<h1>BEST MEN’S COLLECTION</h1>
								<span class="sl-btn">SALE</span>
								<div class="promo-hover"></div>
							</a>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 xs-res-mrbtm">
						<div class="banner-right">
							<a class="promo-link" href="#">
								<img src="{{furl()}}/img/home-1/banner-4.jpg" alt="" />
								<h1>WOMEN’S COLLECTION</h1>
								<span class="promo-hover"></span>
							</a>
						</div>
					</div>


				
					<div class="col-md-3 col-sm-3">
						<div class="banner-right-side">
							<a class="mr-btm promo-link" href="#">
								<img src="{{furl()}}/img/home-1/banner-5.jpg" alt="" />
								<h1>NEW COLLECTION</h1>
								<span class="sl-btn">SALE</span>
								<div class="promo-hover"></div>
							</a>
							<a class="promo-link" href="#">
								<img src="{{furl()}}/img/home-1/banner-6.jpg" alt="" />
								<h1>WOMEN’S COLLECTION</h1>
								<span class="sl-btn">SALE</span>
								<div class="promo-hover"></div>
							</a>
						</div>
					</div>


				</div>
			</div>
		</section>
		<!-- BANNER AREA END -->



		<!-- FEATURED PRODUCT START -->
		<section class="featured-area">
			<div class="container">
				<div class="row">
					<div class="text-center">
						<div class="section-titel">
							<h3>Featured Products</h3>
						</div>
					</div>
					<div class="featured-tab">
						<ul class="text-center">
						
						@foreach($categories as $cat)
						  <li class="@if($loop->iteration == 1){{'active'}} @endif">
						  <a data-toggle="tab" href="#{{$cat->slug}}">{{$cat->name}}</a>
						  </li>
						@endforeach

						 
						</ul>
					</div>
					<div class="tab-content">

					
						@foreach($categories as $cat)
						<div id="{{$cat->slug}}" class="tab-pane @if($loop->iteration==1){{'active'}} @endif">
							<div id="" class="indicator-style features-curosel">
					
								@foreach($cat->fProduct() as $fpro)
								<div class="col-md-12">
									<div class="single-product">
										<div class="product-image">
											<a class="product-img prod-home-img" href="{{route('front.get.product.show',[$cat->slug,$fpro->sub->slug,$fpro->slug])}}">
												<img class="primary-img" src="{{getImage(PRODUCT_PATH.'small/'.$fpro->img)}}" alt="{{$fpro->name}}"   />
												<img class="secondary-img" src="{{getImage(PRODUCT_PATH.'small/'.$fpro->img)}}" alt="{{$fpro->name}}"   />
											</a>
										</div>
										@if($fpro->offer)
										<span class="onsale red">
											<span class="sale-text"> {{$fpro->offer}} %</span>
										</span>
										@else
										<span class="onsale">
											<span class="sale-text">@lang('frontSite.sale')</span>
										</span>
										@endif
										
										<div class="product-action">
											<ul class="pro-rating">
												<li class="pro-ratcolor">{{$cat->name}}</li>
											</ul>
											<h4><a href="{{route('front.get.product.show',[$cat->slug,$fpro->sub->slug,$fpro->slug])}}">{{\Str::Words($fpro->name,3,'..')}}</a></h4>
											<span class="price">$ {{$fpro->price}}</span>
										</div>
										<div class="pro-action">
											<ul>
												
												<li>
													<a class="test all_src_icon"  href="{{route('front.get.product.show',[$cat->slug,$fpro->sub->slug,$fpro->slug])}}" title="" 
													data-toggle="tooltip" data-placement="top" data-original-title="@lang('frontSite.show')">
													<i class="fa fa-eye" aria-hidden="true"></i>
													</a>
												</li>

												<li>
													<a class="test all_src_icon addToCart pointer"  data-proId="{{$fpro->id}}"
													  title=""  
													data-toggle="tooltip" data-placement="top" data-original-title="@lang('frontSite.addToCart')">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
													</a>
												</li>

												
											</ul>
										</div>
									</div>
								</div>
								@endforeach

							</div>
						</div>
						@endforeach

		


					</div>
				</div>
			</div>
		</section>
		<!-- FEATURED PRODUCT END -->
		<!-- HOT DEALS ARAEA START -->
		<section class="hot-deals-area">
			<div class="container">
				<div class="row">
					<div class="hot-deals">
						<div class="col-md-4 col-sm-12">
							<div class="titel">
								<h4>HOT DEALS</h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="pro-details">
								<h5>JORDAN 4 DUNK</h5>
								<div class="pro-review">
									<ul>
										<li class="clr"><i class="fa fa-star"></i></li>
										<li class="clr"><i class="fa fa-star"></i></li>
										<li class="clr"><i class="fa fa-star"></i></li>
										<li class="clr"><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><span>( 3 review )</span></li>
									</ul>
									<p><b>$250.00</b><span>$230.00</span></p>
								</div>
								<div class="pro-shop">
									<a href="#"><i aria-hidden="true" class="fa fa-retweet"></i></a>
									<a href="#"><i aria-hidden="true" class="fa fa-heart"></i></a>
									<a href="#"><i aria-hidden="true" class="fa fa-shopping-cart"></i></a>
								</div>
								<div class="product-cuntdown">
									<div class="timer">
										<div data-countdown="2016/12/01"></div>
									</div> 
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="product-offer">
								<span>-25%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- HOT DEALS ARAEA END -->
		<!-- NEW ARRIVALS START -->
		<section class="featured-area new-arrival">
			<div class="container">
				<div class="row">
					<div class="text-center">
						<div class="section-titel">
							<h3>NEW ARRIVALS</h3>
						</div>
					</div>
					<div class="newarrival-area">
						<div id="newarrival-curosel" class="indicator-style">

							@foreach($latest as $fpro)
								<div class="col-md-12">
									<div class="single-product">
										<div class="product-image">
											<a class="product-img prod-home-img" href="{{route('front.get.product.show',[$fpro->category->slug,$fpro->sub->slug,$fpro->slug])}}">
												<img class="primary-img" src="{{getImage(PRODUCT_PATH.'small/'.$fpro->img)}}" alt="{{$fpro->name}}" height="250" />
												<img class="secondary-img" src="{{getImage(PRODUCT_PATH.'small/'.$fpro->img)}}" alt="{{$fpro->name}}" height="250" />
											</a>
										</div>
										@if($fpro->offer)
										<span class="onsale red">
											<span class="sale-text"> {{$fpro->offer}} %</span>
										</span>
										@else
										<span class="onsale">
											<span class="sale-text"> @lang('frontSite.sale') </span>
										</span>
										@endif
										
										<div class="product-action">
											<ul class="pro-rating">
												<li class="pro-ratcolor">{{ $fpro->category->name }}</li>
											</ul>
											<h4><a href="{{route('front.get.product.show',[$fpro->category->slug,$fpro->sub->slug,$fpro->slug])}}">{{\Str::Words($fpro->name,3,'..')}}</a></h4>
											<span class="price">$ {{$fpro->price}}</span>
										</div>
										<div class="pro-action">
											<ul>
												
												<li>
													<a class="test all_src_icon"  href="{{route('front.get.product.show',[$fpro->category->slug,$fpro->sub->slug,$fpro->slug])}}" title="" 
													data-toggle="tooltip" data-placement="top" data-original-title="@lang('frontSite.show')">
													<i class="fa fa-eye" aria-hidden="true"></i>
													</a>
												</li>

												<li>
													<a class="test all_src_icon addToCart pointer"  data-proId="{{$fpro->id}}"
													  title="" 
													data-toggle="tooltip" data-placement="top" data-original-title="View Details">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
													</a>
												</li>

												
											</ul>
										</div>
									</div>
								</div>
								@endforeach


					
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- NEW ARRIVALS END -->
		<!-- LATEST BLOG AREA START -->
		<section class="latest-blog-area">
			<div class="container">
				<div class="text-center">
					<div class="section-titel">
						<h3>NEW ARRIVALS</h3>
					</div>
				</div>
				<div class="row">
					<div class="blog-area">
					<div class="col-md-6 col-sm-12 res-mr-btm xs-res-mrbtm">
						<div class="blog-left">
							<a class="product-image-overlay" href="#">
								<img src="{{furl()}}/img/home-1/blog-1.jpg" alt="" />
								<div class="left-content text-center">
									<h1>SHARP STYLE </h1>
									<h3>For this season</h3>
								</div>
							</a>
						</div>
					</div>

					@foreach($posts as $pos)
					@if($loop->iteration == 1)
					<div class="col-md-3 col-sm-6 xs-res-mrbtm">
						<div class="blog-right">
							<a class="product-image-overlay" href="#">
								<img src="{{getImage(BLOG_PATH.'small/'.$pos->img)}}" alt="{{$pos->name}}" />
							</a>
							<div class="blog-content">
								<i class="fa fa-book"></i>
								<span>{{date('Y-M-D',strtotime($pos->created_at))}}</span>
								<p>{{\Str::Words($pos->small_description,'15','....')}}</p>
								<a href="{{route('front.get.blog.show',[$pos->slug])}}">READ MORE</a>
							</div>
						</div>
					</div>
					@else
					<div class="col-md-3 col-sm-6">
						<div class="blog-right">
							<div class="blog-content">
								<i class="fa fa-book"></i>
								<span>{{date('Y-M-D',strtotime($pos->created_at))}}</span>
								<p>{{\Str::Words($pos->small_description,'15','....')}}</p>
								<a href="{{route('front.get.blog.show',[$pos->slug])}}">READ MORE</a>
							</div>
							<a class="product-image-overlay" href="#">
								<img src="{{getImage(BLOG_PATH.'small/'.$pos->img)}}" alt="{{$pos->name}}" />
							</a>
						</div>
					</div>
					@endif

					@endforeach
					
					</div>
				</div>
			</div>
		</section>
		<!-- LATEST BLOG AREA END -->











		




@endsection