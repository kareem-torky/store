
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- HEADER TOP AREA START -->
		<section class="header-top-area">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="left-msg pull-left">
							<h6>FREE SHIPPING ON OVER $100</h6>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right-login pull-right">
							<div class="currencies-block-top curency pull-left">
								<div class="current">
									@if(clientAuth()->user())
									<a href="{{route('front.client.get.profile.index')}}">
									<span> Welcome {{ Str::Words(clientAuth()->user()->name,3,'..')}} </span>
									</a>
									/
									<a href="{{route('front.client.get.auth.logout')}}">
									<span> LOGOUT</span>
									</a>

									
									@endif
								</div>
								
							</div>
							<div class="languages-block-top curency pull-left">
								<div class="current">
									<span>LANGUAGE</span>
									<i class="fa fa-angle-down"></i>
								</div>
								<ul class="first-languages toggle-content">
									<li><a href="#">ENGLISH</a></li>
									<li><a href="#">ARABIC</a></li>

								</ul>
							</div>
							<div class="curency pull-left">
								<div class="current">
									@if(!clientAuth()->user())
									<span><a href="{{route('front.client.get.auth.login')}}">LOG IN</a></span> - 
									<span><a href="{{route('front.client.get.auth.register')}}">REGISTER</a></span>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
        <!-- HEADER TOP AREA END -->