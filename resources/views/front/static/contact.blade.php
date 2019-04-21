@extends('front.main')


@section('content')


		<!-- MAP-AREA START -->
		<div class="map-area">
			<div id="googleMap" style="width:100%;height:445px;">
				{!!$setting->map!!}
			</div>
		</div>
		<!-- MAP-AREA END -->
		<!-- ADDRESS AREA START -->
		<section class="adress-area">
			<div class="container">
				<div class="row">
					<div class="col-md-4 res-mr-btm xs-res-mrbtm">
						<div class="address-single">
							<div class="all-adress-info">
								<div class="icon">
									<span><i class="fa fa-user-plus"></i></span>
								</div>
								<div class="info">
									<h3>PHONE</h3>
									<p>{{$setting->phone}}</p>
									<p>{{$setting->mobile}}</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 res-mr-btm xs-res-mrbtm">
						<div class="address-single">
							<div class="all-adress-info">
								<div class="icon">
									<span><i class="fa fa-map-marker"></i></span>
								</div>
								<div class="info">
									<h3>ADDRESS</h3>
									<p>{{$setting->address}}</p>
									<p>{{$setting->address}}</p>
									<!-- <p>Roitan city, USA.</p> -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="address-single">
							<div class="all-adress-info">
								<div class="icon">
									<i class="fa fa-envelope"></i>
								</div>
								<div class="info">
									<h3>E-MAIL</h3>
									<p>{{$setting->email}}</p>
									<p>{{$setting->email}}</p>
									<!-- <p>www.companyweb.com</p> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ADDRESS AREA END -->
		<!-- CONTACT FROM AREA START -->
		<section class="contact-from-area">
			<div class="container">
				<div class="contact-from-heading">
					<h3>LEAVE A MESSAGE</h3>
				</div>
				<div class="row">
					<form  method="POST" id="contact-form">

                        @csrf
                        <div class="col-md-12">
                            <ul id="errors"></ul>
                        </div>
						<div class="col-md-6">
							<div class="contact-from-left">
								<div class="input-text">
									<input type="text" placeholder="Your Name" name="name" id="name" required maxlength="150" />
								</div>
								<div class="input-text">
									<input type="email" placeholder="Your Email" name="email" id="email" required maxlength="150"/>
								</div>
								<div class="input-text">
									<input type="number" placeholder="Your Phone" name="phone" id="phone" required maxlength="15"/>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="contact-from-right">
								<div class="input-message">
									<textarea id="message" placeholder="Your Message" name="message" required maxlength="1150"></textarea>
									<input type="submit" value="SEND" name="message" id="submitMessage" class="pointer"   />
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- CO -->





	




@endsection




@section('script')
<script type="text/javascript">
  
    $('#contact-form').parsley();


    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

   

    $("#contact-form").submit(function(e) 
    {
        e.preventDefault();

        // return false;
        var formData  = new FormData(jQuery('#contact-form')[0]);
        $.ajax({

           type:'POST',
           url:"{{route('front.post.contactus.sendMessage')}}",
           data:formData,
           contentType: false,
           processData: false,
           success:function(data)
           {
             $("#errors").html('');
             $("#errors").append("<li class='alert alert-success text-center'>"+data.success+"</li>")
             $('.input-text').find("input").val("");
             $('.input-message').find("textarea").val("");
           },
            error: function(xhr, status, error) 
            {
              $("#errors").html('');
              $.each(xhr.responseJSON.errors, function (key, item) 
              {
                $("#errors").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
              });
            }

        });

	});

</script>



@endsection