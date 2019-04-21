@extends('front.main')

@section('content')


<!-- BANNER AREA STRAT -->
		<section class="bannerhead-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner-heading">
							<h1>CHECKOUT LIST</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- BANNER AREA END -->
		<!-- CHECKOUT AREA START -->
		<section class="checkout-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                        <ul id="errors"></ul>
                    </div>
                   @if(\Cart::getTotalQuantity())
					<div class="col-md-12 res-mr-btm">

						<form  id="orderForm">
							<div class="coverLoading" style=""><img src="{{furl()}}/img/loading.gif"></div>
							<div class="checkout-left-area">
								<div class="panel-group" id="accordion">

									<div class="panel panel-default">
										<div class="panel-heading">
										  <h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
											<span>1</span>Order Review</a>
										  </h4>
										</div>
										<div id="collapse5" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="order-review" id="checkout-review">    
													<div class="table-responsive" id="checkout-review-table-wrapper">
														<table class="data-table" id="checkout-review-table">
															<thead>
																<tr>
																	<th rowspan="1">Product Name</th>
																	<th colspan="1">Price</th>
																	<th rowspan="1">Qty</th>
																	<th colspan="1">Subtotal</th>
																</tr>
															</thead>
															<tbody>

																@foreach(\Cart::getContent() as $cart)
																<tr>
																	<td><h3 class="product-name">{{$cart->name}}</h3></td>
																	<td><span class="cart-price"><span class="price">$ {{$cart->price}}  </span></span></td>
																	<td>{{$cart->quantity}}</td>
																	<!-- sub total starts here -->
																	<td><span class="cart-price"><span class="price">$
																	{{$cart->price * $cart->quantity}}</span></span></td>
																</tr>
																@endforeach
															
															</tbody>
															<tfoot>
																<tr>
																	<td colspan="3">Subtotal</td>
																	<td><span class="price">${{\Cart::getSubTotal()}}</span></td>
																</tr>
																<tr>
																	<td colspan="3">Shipping Handling (Flat Rate - Fixed)</td>
																	<td><span class="price">$10.00</span></td>
																</tr>
																<tr>
																	<td colspan="3"><strong>Grand Total</strong></td>
																	<td><strong><span class="price">$ {{ \Cart::getSubTotal() + 10}}</span></strong></td>
																</tr>
															</tfoot>
														</table>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									
									<div class="panel panel-default">
										<div class="panel-heading">
										  <h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
											<span>2</span>Billing Information</a>
										  </h4>
										</div>
										<div id="collapse2" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="row">

													@csrf
							                        
													<div class="col-md-12">
														<div class="country-select">
															<label>Governorate <span class="required">*</span></label>
															<select name="gov_id" required>
															  <option value="">@lang('frontSite.choose')</option>
															 @foreach($govs as $gov)
															  <option value="{{$gov->id}}">{{$gov->name}}</option>
															  @endforeach
															</select> 										
														</div>
													</div>
													<div class="col-md-12">
														<div class="checkout-form-list">
															<label> Name <span class="required">*</span></label>										
															<input  required type="text" name="name" placeholder="" />
														</div>
													</div>
		
													<div class="col-md-12">
														<div class="checkout-form-list">
															<label>Address <span class="required">*</span></label>
															<input  required type="text"  name="address"  placeholder="" />
														</div>
													</div>

													<div class="col-md-6">
														<div class="checkout-form-list">
															<label>Email Address <span class="required">*</span></label>										
															<input  required type="email" name="email" placeholder="" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="checkout-form-list">
															<label>Mobile  <span class="required">*</span></label>										
															<input  required type="text" name="mobile" placeholder="" />
														</div>
													</div>
												<!-- 	<div class="col-md-12">
														<div class="checkout-form-list create-acc">	
															<input id="cbox" type="checkbox" name="checkAccount" />
															<label>Create an account?</label>
														</div>
														<div id="cbox_info" class="checkout-form-list create-account">
															<p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
															<label>Account password  <span class="required">*</span></label>
															<input type="password" placeholder="password" required name="password" />
															<br>
															<br>
															<input type="password" placeholder="confirm password" required name="confirm-password" />	
														</div>
													</div>	 -->

													<div class="col-md-12" id="">
														<div class="cart-btn-3" id="review-buttons-container">
															<p class="left">Forgot an Item? 
																<a href="{{route('front.get.cart.show')}}">Edit Your Cart</a></p>
															<button type="submit" title="Place Order" class="button btn-checkout"><span>Place Order</span></button>
														</div>
													</div>							
												</div>
											</div>
										</div>
									</div>
								
									
								</div> 
							</div>
						</form>
					</div>

					@else					
						<h3 class="alert alert-danger text-center">@lang('frontSite.dataNotFound')</h3>
				    @endif
					<!-- <div class="col-md-3">
						<div class="checkout-right-area">
							<p>YOUR CHECKOUT PROGRESS</p>
							<ul>
								<li><a href="#"> Billing Address</a></li>
								<li><a href="#"> Shipping Address</a></li>
								<li><a href="#"> Shipping Method</a></li>
								<li><a href="#"> Payment Method</a></li>
							</ul>
						</div>
					</div> -->
				</div>
			</div>
		</section>
		<!-- CHECKOUT AREA END -->
@endsection



@section('script')
<script type="text/javascript">
  
    $('#orderForm').parsley();


    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

   

    $("#orderForm").submit(function(e) 
    {

        e.preventDefault();

        // return false;
        var formData  = new FormData(jQuery('#orderForm')[0]);
        $.ajax({

           type:'POST',
           url:"{{route('front.post.order.sendOrder')}}",
           data:formData,
           contentType: false,
           processData: false,
           beforeSend:function()
           {
           	   $(".coverLoading").css("display","block")
           	   $("#orderForm input[type='submit']").css("display","none");
           },
           success:function(data)
           {
             $("#errors").html('');
             $("#errors").append("<li class='alert alert-success text-center'>"+data.success+"</li>")
             $('input').val("");
             $("textarea").val("");
             $(".coverLoading").css("display","none")
           	 $("#price_filter input[type='submit']").css("display","block");
             setTimeout(function(){ location.href = "{{route('front.get.home.index')}}"}, 3000);
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
