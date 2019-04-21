@extends('front.main')


@section('content')



<!-- BANNER AREA STRAT -->
<section class="bannerhead-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-heading">
					<h1>SHOPPING</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- BANNER AREA END -->
<!-- SHOP AREA START -->
<section class="wishlist-area shop-area">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="wishlist-left-area">

					<div class="category">
						<h4>{{$row->name}}</h4>
						<div class="category-list">
							<ul>
								@foreach($row->sub() as $sub)
								<li>
									<a href="{{route('front.get.product.subCategory',[$row->slug,$sub->slug])}}">
										<i class="fa fa-angle-double-right"></i>{{\Str::Words($sub->name,'3','')}} <span>({{$sub->productMenu()->count()}})</span>
									</a>
								
								</li>
								@endforeach
							</ul>
						</div>
						<div class="price-slider">
							<h4>PRICE SLIDER</h4>
							<aside class="widget shop-filter">
								<form class="price_filter" method="post" id="price_filter">
									@csrf
									<div id="slider-range"></div>
									<input type="hidden" name="min" id="min">
									<input type="hidden" name="max" id="max">
									<div class="price_slider_amount">
										<input type="text" id="amount" name="price"  placeholder="Add Your Price" />
										<input type="submit"  value="Filter"/>  
									</div>
								</form>							
							</aside>
						</div>
						<div class="price-slider size-area">
							<h4>SIZES</h4>
							<ul>
								@foreach($sizes as $size)
								<li><a href="#">{{$size->title}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>




					<div class="category">
						<h4>Categories</h4>
						<div class="category-list">
							<ul>
								@foreach($categories as $cat)
								<li>
									<a href="{{route('front.get.product.category',[$cat->slug])}}">
										<i class="fa fa-angle-double-right"></i>{{\Str::Words($cat->name,'3','')}} <span>({{$cat->product()->count()}})</span>
									</a>
								
								</li>
								@endforeach
						</div>
					</div>









					<!-- <div class="popular-tag">
						<h4>POPULAR TAG</h4>
						<ul>
							<li><a href="#">kids</a></li>
							<li><a href="#">fashion</a></li>
							<li><a href="#">dresses</a></li>
							<li><a href="#">shopy</a></li>
							<li><a href="#">nice</a></li>
							<li><a href="#">child</a></li>
						</ul>
					</div> -->
					<div class="compare-products">
						<h4 class="text-center mt-10" style="margin-top: 20px;">Offers</h4>

						@foreach($offers as $offer)
						<div class="single-product">
							<a href="{{route('front.get.product.show',[$offer->category->slug,$offer->sub->slug,$offer->slug])}}">
								<img src="{{getImage(PRODUCT_PATH.'small/'.$offer->img)}}" alt="{{$offer->name}}" />
							<span>$ {{$offer->price}}</span>
							<p>SAVE UP TO {{$offer->offer}} % OFF</p>
							</a>
						</div>
						@endforeach
					</div>
					<div class="shop-top-seller">
						<h4>TOP SELLERS</h4>



						
						@foreach($fetured as $feat)
						<div class="shop-single-main">
							<div class="top-seller-product">
								<img src="{{getImage(PRODUCT_PATH.'small/'.$feat->img)}}" alt="{{$feat->name}}" style="width: 104px; height: 104px;"> 
							</div>
							<div class="top-seller-details">
								<h5>
									<a href="{{route('front.get.product.show',[$feat->category->slug,$feat->sub->slug,$feat->slug])}}">
										{{Str::Words($feat->name,3,'..')}}
									</a>
								</h5>
								<h5>$ {{$feat->price}}</h5>
								<ul>
									@if($feat->colors)
										<?php $colors = json_decode($feat->colors); ?>
										@foreach($colors as $co)
											@if($feat->getColor($co))
											<i class="fa fa-square" aria-hidden="true" style="color: {{$feat->getColor($co)->color}}" ></i>
											@endif
										@endforeach
									@endif
								</ul>
								
							</div>
						</div>
						@endforeach


					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="shop-right-area">
					<div class="shop-banner">
						<img src="{{furl()}}/img/other-pg/shop-1.jpg" alt="" />
					</div>
					<div class="shop-tab-area">
						<!--NAV PILL-->
						<div class="shop-tab-pill">
						
						</div>
						<div class="coverLoading" style=""><img src="{{furl()}}/img/loading.gif"></div>
						<!--NAV PILL-->
						<div class="tab-content">
							<div class="row tab-pane active data-prod" id="grid">




								@foreach($allProducts as $fpro)
								<div class="col-md-4 col-sm-4">
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
												<li class="pro-ratcolor">{{ $fpro->sub->name }}</li>
											</ul>
											<h4><a href="{{route('front.get.product.show',[$fpro->category->slug,$fpro->sub->slug,$fpro->slug])}}">{{\Str::Words($fpro->name,3,'..')}}</a></h4>
											<span class="price">$ {{$fpro->price}}</span>
										</div>
										<div class="pro-action">
											<ul>
												
												<li>
													<a class="test all_src_icon addToCart"  href="{{route('front.get.product.show',[$fpro->category->slug,$fpro->sub->slug,$fpro->slug])}}" title="" 
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



								<div class="col-sm-12">
									<div class="single-product">
										{{$allProducts->links()}}
									</div>
								</div>
							
							</div>
						
						</div>
						<!--NAV PILL-->
						<div class="shop-tab-pill dwn">
							
						</div>
						<!--NAV PILL-->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- SHOP AREA END -->



		
@endsection

@section('script')



<script type="text/javascript">
  



    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });


    $("#price_filter").submit(function(e) 
    {
        e.preventDefault();

        // return false;
        var formData  = new FormData(jQuery('#price_filter')[0]);
        $.ajax({

           type:'POST',
           url:"{{route('front.post.product.filter')}}",
           data:formData,
           contentType: false,
           processData: false,
           beforeSend:function()
           {
           	   $(".coverLoading").css("display","block")
           	   $("#price_filter input[type='submit']").css("display","none");
           },
           success:function(data)
           {
             $(".data-prod").html('');
             $(".data-prod").html(data);
           	 $(".coverLoading").css("display","none")
           	 $("#price_filter input[type='submit']").css("display","block");


           },
            error: function(xhr, status, error) 
            {
              $("#errors").html('');
              $.each(xhr.responseJSON.errors, function (key, item) 
              {
                $("#errors").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
              });
             $(".coverLoading").css("display","none")
              
            }

        });

	});

</script>



@endsection

