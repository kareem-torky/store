@extends('front.main')


@section('content')

<?php $about = json_decode($setting->who_us); ?>
	<!-- BANNER AREA STRAT -->
		<section class="bannerhead-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner-heading">
							<h1>ABOUT US</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- BANNER AREA END -->
		<!-- WELCOME AREA START -->
		<section class="welcome-area">
			<div class="welcome-heading">
				<h1>{{  json_data($about,'aboutUsTitle')}}</h1>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="welcome-left">
							{!! json_data($about,'aboutUsDescription') !!}
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="welcome-right">
							<img src="{{getImage(SETTINGS_PATH.json_data($about,'img1'))}}" alt="" />
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- WELCOME AREA END -->
		<!-- WHO WE ARE SKILL AREA START -->
		<section class="whoare-skill-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 res-mr-btm">
						<div class="whoare-skill-heading">
							<h3>Who We Are</h3>
						</div>
						<div class="whoare-skill-left">
							<div class="panel-group" id="accordion">
							  <div class="panel panel-default">
								<div class="panel-heading titel_panel">
								  <h4 class="panel-title">
									<a class="accordion-toggle accrodin_2 border" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									  <i class="fa fa-minus-circle"></i>
									</a>
									<a class="accordion-toggle right" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									  Who We Are
									</a>
								  </h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in">
								  <div class="panel-body">
									There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined.If you are going to use a passage of Lorem Ipsum 
								  </div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading titel_panel">
								  <h4 class="panel-title">
									<a class="accordion-toggle accrdion_3 border" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
									  <i class="fa fa-plus-circle"></i>
									</a>
									<a class="accordion-toggle right" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Our Mission
									</a>
								  </h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
								  <div class="panel-body">
									There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined.If you are going to use a passage of Lorem Ipsum 
								  </div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading titel_panel">
									<h4 class="panel-title">
										<a class="accordion-toggle accrdion_3 border" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
										<i class="fa fa-plus-circle"></i>
										</a>
										<a class="accordion-toggle right" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
										  What We Do
										</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse">
								  <div class="panel-body">
									There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined.If you are going to use a passage of Lorem Ipsum 
								  </div>
								</div>
							  </div> 
							  <div class="panel panel-default">
									<div class="panel-heading titel_panel">
									  <h4 class="panel-title">
										<a class="accordion-toggle accrdion_3 border" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
										  <i class="fa fa-plus-circle"></i>
										</a>
										<a class="accordion-toggle right" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
										  Our Clients
										</a>
									  </h4>
									</div>
								<div id="collapseFour" class="panel-collapse collapse">
									  <div class="panel-body">
										There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined.If you are going to use a passage of Lorem Ipsum 
									  </div>
								</div>
							  </div> 
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</section>
		<!-- WHO WE ARE SKILL AREA END -->




@endsection