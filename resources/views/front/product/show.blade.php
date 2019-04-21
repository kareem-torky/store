@extends('front.main')


@section('content')



<!-- PRODUCT SINGLE AREA START -->
		<div class="product-simple-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="single-product-image">
							<div class="single-product-tab">
							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
							  	@if($row->images)
							  	<?php $images = json_decode($row->images); ?>
							  	@endif

								<li role="presentation" class="active">
									<a href="#home" aria-controls="home" role="tab" data-toggle="tab"><img alt="" src="{{getImage(PRODUCT_PATH.$row->img)}}"></a>
								</li>
								
								@if($images)
								@foreach($images as $img)
								<li role="presentation">
									<a href="#t-{{$loop->iteration}}" aria-controls="t-{{$loop->iteration}}" role="tab" data-toggle="tab"><img alt="" src="{{getImage(PRODUCT_PATH.$img)}}"></a>
								</li>
								@endforeach
								@endif

							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<img alt="" src="{{getImage(PRODUCT_PATH.$row->img)}}" style="width:100%; height: 100%;">
								</div>
								
								@if($images)
								@foreach($images as $img)
								<div role="tabpanel" class="tab-pane" id="t-{{$loop->iteration}}" >
									<img alt="" src="{{getImage(PRODUCT_PATH.$img)}}" style="width:100%; height: 100%;">
								</div>
								@endforeach
								@endif

							  </div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="single-product-info">
							<div class="product-nav">
								<a href="#"><i class="fa fa-angle-right"></i></a>
							</div>
							<h1 class="product_title">Integer consequat ante lectus</h1>
							<div class="price-box">
								
								@if($row->offer)
								<span class="new-price"> £ {{ $row->price - ($row->price * ($row->offer/100))}}</span> -  
								<span class="old-price"><del>£ {{$row->price}} </del></span>
								@else
								<span class="old-price"> £ {{$row->price}} </span>
								@endif
							</div>
							<div class="pro-rating">
								@if($row->colors)
									<?php $colors = json_decode($row->colors); ?>
									@foreach($colors as $co)
										@if($row->getColor($co))
										<i class="fa fa-square fa-2x" aria-hidden="true" style="color: {{$row->getColor($co)->color}}" ></i>
										@endif
									@endforeach
								@endif
							</div>
							<div class="short-description">
								<p>{{$row->small_desc}}</p>						
							</div>
							<!-- <div class="stock-status">
								<label>Availability</label>: <strong>In stock</strong>
							</div> -->

								<div class="quantity">
									<button data-proId="{{$row->id}}" class="addToCart">Add to cart</button>
								</div>
						

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- PRODUCT SINGLE AREA END -->
		<!-- PRODUCT TAB AREA START -->
		<div class="product-tab-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="product-tabs">
							<div>
							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab-desc" aria-controls="tab-desc" role="tab" data-toggle="tab">Description</a></li>


							<!-- 	<li role="presentation"><a href="#page-comments" aria-controls="page-comments" role="tab" data-toggle="tab">Reviews (1)</a></li> -->
							  </ul>
							  <!-- Tab panes -->
							  <div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="tab-desc">
									<div class="product-tab-desc">
										<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
										<p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>
									</div>
								</div>
								<!-- <div role="tabpanel" class="tab-pane" id="page-comments">
									<div class="product-tab-desc">
										<div class="product-page-comments">
											<h2>1 review for Integer consequat ante lectus</h2>
											<ul>
												<li>
													<div class="product-comments">
														<img src="{{furl()}}/img/blog/avatar.png" alt="" />
														<div class="product-comments-content">
															<p><strong>admin</strong> -
																<span>March 7, 2015:</span>
																<span class="pro-comments-rating">
																	<i class="fa fa-star"></i>								
																	<i class="fa fa-star"></i>								
																	<i class="fa fa-star"></i>								
																	<i class="fa fa-star"></i>								
																</span>
															</p>
															<div class="desc">
																Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.
															</div>
														</div>
													</div>
												</li>
											</ul>
											<div class="review-form-wrapper">
												<h3>Add a review</h3>
												<form action="#">
													<input type="text" placeholder="your name"/>
													<input type="email" placeholder="your email"/>
													<div class="your-rating">
														<h5>Your Rating</h5>
														<span>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
														</span>
														<span>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
														</span>
														<span>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
														</span>
														<span>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
														</span>
													</div>
													<textarea id="product-message" cols="30" rows="10" placeholder="Your Rating"></textarea>
													<input type="submit" value="submit" />
												</form>
											</div>
										</div>
									</div>
								</div> -->
							  </div>
							</div>						
						</div>
						<div class="clear"></div>
						<div class="upsells_products_widget">
							<div class="text-center">
								<div class="section-titel">
									<h3>Related Products</h3>
								</div>
							</div>
							<div class="row">






								@foreach($related as $fpro)
								<div class="col-md-3 col-sm-4">
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
													<a class="test all_src_icon "  href="{{route('front.get.product.show',[$fpro->category->slug,$fpro->sub->slug,$fpro->slug])}}" title="" 
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






						<div class="clear"></div>
						<div class="upsells_products_widget">
							<div class="text-center">
								<div class="section-titel">
									<h3>Featured Products</h3>
								</div>
							</div>
							<div class="row">






								@foreach($fetured as $fpro)
								<div class="col-md-3 col-sm-4">
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
													<a class="test all_src_icon "  href="{{route('front.get.product.show',[$fpro->category->slug,$fpro->sub->slug,$fpro->slug])}}" title="" 
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
			</div>
		</div>
		<!-- PRODUCT TAB AREA START -->



		
@endsection