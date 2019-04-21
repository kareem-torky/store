@extends('front.main')


@section('content')


	<!-- BANNER AREA STRAT -->
		<section class="bannerhead-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner-heading">
							<h1>AUTHENTICATION</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- BANNER AREA END -->
		<!-- ACOOUNT FROM AREA START -->
		<section class="login-area">
			<div class="container">
				<div class="row">
					<div class="account-details">
					
						<div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-3">
							<form method="post" class="login-form" id="log-form" action="{{route('front.client.post.auth.doLogin')}}">
								<h1 class="heading-title">Already registered?</h1>
								@csrf
								@include('admin.msg._errors')
								
								<p class="form-row">
									<label>Email address</label>
									<input type="email" name="email" value="{{old('email')}}" required maxlength="100">
								</p>
								<p class="form-row">
									<label>Password</label>
									<input type="password" name="password" required maxlength="50">
								</p>
								<!-- <p class="lost-password form-group"><a rel="nofollow" href="#">Forgot your password?</a></p> -->
								<p class="submit">				
									<button class="" name="SubmitLogin" id="submitlogin" type="submit">
										<span><i class="fa fa-lock"></i>Sign In</span>
									</button>
								</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ACOOUNT FROM AREA END -->



		




@endsection

@section('script')
<script type="text/javascript">
  
    $('#log-form').parsley();

 </script>

@endsection