@if($allProducts->count())
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
					<li class="pro-ratcolor">{{ $fpro->category->name }}</li>
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
@else

	<div class="alert alert-danger text-center">@lang('frontSite.dataNotFound')</div>

@endif