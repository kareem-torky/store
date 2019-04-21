

        		<!-- OUR BRAND AREA START -->
		<section class="our-brand-area">
			<div class="container">
				<div class="text-center">
					<div class="section-titel">
						<h3>OUR BRANDS</h3>
					</div>
				</div>
				<div class="row blog-area">
					<div id="ourbrand-owl">

						@foreach($brands as $br)
						<div class="col-md-12"><img src="{{getImage(BRAND_PATH.'small/'.$br->img)}}" alt="{{$br->img}}" /></div>
						@endforeach
						
					</div>
				</div>
			</div>
		</section>
		<!-- OUR BRAND AREA END -->
	



		<!-- Footer Top Area Start -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="social-icon">
							<ul>
								 @if($setting->facebook)
		                        <li><a href="{{$setting->facebook}}"  target="_blank"><i class="fa fa-facebook-f" ></i></a></li>
		                        @endif
		                         @if($setting->twitter)
		                        <li><a href="{{$setting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
		                        @endif
		                         @if($setting->instagram)
		                        <li><a href="{{$setting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
		                        @endif
		                         @if($setting->linkedin)
		                        <li><a href="{{$setting->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
		                        @endif
								
							</ul>
						</div>
					</div>
					<div class="col-md-8 col-sm-8">
						<div class="foteer-news">
							<h3>NEWSLETTER</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed</p>
						</div>
						<div class="search-input">
							<form action="#" id="subscribe-form">
								<input type="email" placeholder="Enter your Email..." name="email" class="input-sub">
								<button class="search-button" type="submit" value="Submit">Subcribe</button>
								@csrf
                        
		                    </form>
		                    <div class="" style="margin-top:70px;">
		                        <ul id="errors-footer"></ul>
		                    </div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Top Area End -->
		<!-- Footer Middle Area Start -->
		<section class="footer-middle">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-12 xs-res-mrbtm">
						<div class="footer-menu">
							<h4>MY ACCOUNT</h4>
							<ul>
								<li><a href="#">Login</a></li>
								<li><a href="#">My Account</a></li>
								<li><a href="#">My Cart</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Checkout</a></li>
								<li><a href="#">Userinfor</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 hidden-sm hidden-xs">
						<div class="footer-menu">
							<h4>INFORMATION</h4>
							<ul>
								<li><a href="#">Sitemap</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Your Account</a></li>
								<li><a href="#">Advanced Search</a></li>
								<li><a href="#">Affiliates</a></li>
								<li><a href="#">Group Sales</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-12 xs-res-mrbtm">
						<div class="footer-menu">
							<h4>CONTACT US</h4>
							<ul>
								<li><a href="#">Product Recall</a></li>
								<li><a href="#">Gift Vouchers</a></li>
								<li><a href="#">Returns and Exchanges</a></li>
								<li><a href="#">Shipping Options</a></li>
								<li><a href="#">Blogs</a></li>
								<li><a href="#">Help & Faqs</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-12">
						<div class="address-area">
							<a href="index.html"><img src="{{furl()}}/img/home-1/footer-logo.png" alt="" /></a>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
							<div class="contact-details">
								<ul>
									<li><i class="fa fa-phone"></i>+(00) 56-888-999</li>
									<li><i class="fa fa-envelope-o"></i> admin@DevItems.com</li>
									<li><i class="fa fa-map-marker"></i> 1212, Bigrun street, France.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Footer Middle Area End -->
		<!-- Footer Bottom Area Start -->
		<div class="footer-bottom-area">
			<div class="container">
				<div class="row ">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p>Copyright &copy;  <a href=""> eraasoft. </a> All Rights Reserved.</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<img src="{{furl()}}/img/other-pg/payment.png" alt="" />
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Bottom Area End -->
