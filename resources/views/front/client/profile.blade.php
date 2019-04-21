@extends('front.main')


@section('content')


	<!-- BANNER AREA STRAT -->
		<section class="bannerhead-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner-heading">
							<h2>My Account</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- BANNER AREA END -->
		<!-- My Account Area Start -->
		<div class="my-account-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="heading-title">Procced to Checkout </h1>
						<p>Welcome to your account. Here you can manage all of your personal information and orders.</p>
					</div>
				</div>
				<div class="row">
					<div class="addresses-lists">
						<div class="col-xs-12 col-sm-12 col-lg-12">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												<i class="fa fa-building"></i>
											   <span>Add my Information</span>
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<div class="coupon-info">
												<h1 class="heading-title">Your Information </h1>
												<p class="coupon-text">To add a new address, please fill out the form below.</p>
												<p class="required">*Required field</p>
												<form method="post" id="editInfo" action="{{route('front.client.post.auth.editProfile')}}">
													@include('admin.msg._errors')
													@csrf
													<p class="form-row">
														<label>Your Full Name<span class="required">*</span></label>
														<input type="text" name="name" required maxlength="100" value="{{clientAuth()->user()->name}}" />
													</p>
													<p class="form-row">
														<label>Address<span class="required">*</span></label>
														<input type="text" name="address" required maxlength="500" value="{{clientAuth()->user()->address}}"  />
													</p>
												
													<p class="form-row">
														<label>Mobile phone<span class="required">*</span></label>
														<input type="text" name="mobile" required maxlength="15" value="{{clientAuth()->user()->mobile}}" />
													</p>

													<p class="form-row">
														<label>Second Mobile phone<span class="required">*</span></label>
														<input type="text" name="mobile2"  maxlength="15" value="{{clientAuth()->user()->mobile2}}" />
													</p> 
													<p class="required">** You must register at least one phone number.</p>
													<p class="form-row order-notes">
														<label>Additional information</label>
														<textarea name="more_info">{{strip_tags(clientAuth()->user()->more_info)}}</textarea>
													</p>
													<button title="Save" class="btn btn-default button button-small" type="submit">
														<span>
															  Save
															<i class="fa fa-chevron-right"></i>
														</span>
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingTwo">
										<h4 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												<i class="fa fa-list-ol"></i>
												<span>My Orders</span>
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
											<div class="coupon-info">
												<h1 class="heading-title">Order history </h1>
												<p class="coupon-text">Here are the orders you've placed since your account was created.</p>


												@if(clientAuth()->user()->orders)

												<table class="table table-bordered table-responsive">
													<thead>
														<tr>
															<th class="product-image">Image</th>
															<th class="product-name">Product Name</th>
															<th class="product-unit-price">Unit Price</th>
															<th class="product-quantity">Quantity</th>
															<th class="product-quantity">Status</th>
														</tr>
													</thead>
													<tbody>

													@foreach(clientAuth()->user()->orders as $ord)
																
														<tr><td colspan="5" class="order-hist">{{ date('Y-m-D',strtotime($ord->created_at))}}</td></tr>
														@foreach($ord->content as $co)
														<tr>
	
															<td class="text-center">
																
																	<img alt="{{$co->product->name}}" src="{{getImage(PRODUCT_PATH.'small/'.$co->product->img)}}" style="height: 150px; width: 130px;">
																</a>
															</td>
															<td class="product-name text-center">
																<h5 class="text-center">
																	
																	{{ $co->product->name}}
																	
																</h5>
															</td>
															<td class="product-unit-price text-center">
																<p class="text-center">  $ {{$co->product->price}}  </p>
															</td>
															<td class="product-quantity product-cart-details text-center">
																{{$co->quantity}}
															</td>
															<td class="product-quantity product-cart-details text-center">
																{{$co->status}}
															</td>

														</tr>
														
														@endforeach

														
														<tr><td colspan="5"></td></tr>
														<tr><td colspan="5"></td></tr>

													@endforeach

														
																
													
													</tbody>
												</table>
												@else
													
													<div class="order-history">
														<p class="alert text-center">You have not placed any orders.</p>
													</div>

												@endif




												
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
				
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="create-account-button pull-left">
							<a href="index.html" class="btn btn-default button button-small" title="Home">
								<span>
									<i class="fa fa-chevron-left"></i>
									  Home
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- My Account Area End -->




@endsection

@section('script')

<script type="text/javascript">
  
    $('#editInfo').parsley();

 </script>

@endsection