<div class="media header-middle-checkout">
	<div class="media-left check-img">
		<a href="{{route('front.get.product.show',[$row->category->slug,$row->sub->slug,$row->slug])}}">
			<img alt="" src="{{getImage(PRODUCT_PATH.$row->img)}}" style="width: 70px; height: 70px;">
		</a>
	</div>
	<div class="media-body checkout-content">
		<h4 class="media-heading">
			<a href="{{route('front.get.product.show',[$row->category->slug,$row->sub->slug,$row->slug])}}">{{\Str::Words($row->name,2,'')}}</a>
			<span title="Remove This Item" class="btn-remove checkout-remove itemcartRemove" data-CartId="{{$row->id}}" > 
				<i class="fa fa-trash"></i>
			</span>
		</h4>
		<p>1 x @if($row->offer) {{ $row->price - ($row->price * ($row->offer/100))}} @else {{$row->price}} @endif</p>
	</div>
</div>