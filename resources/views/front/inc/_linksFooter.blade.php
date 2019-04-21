		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="{{furl()}}/js/vendor/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
        <script src="{{furl()}}/js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
        <script src="{{furl()}}/js/owl.carousel.min.js"></script>
		<!-- meanmenu js -->
        <script src="{{furl()}}/js/jquery.meanmenu.js"></script>
        <!-- Nivo slider js  --> 		
		<script src="{{furl()}}/lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<script src="{{furl()}}/lib/home.js" type="text/javascript"></script>
		<!-- count down js  -->
		<script src="{{furl()}}/js/jquery.countdown.js"></script>
		<!-- jquery-ui js -->
        <script src="{{furl()}}/js/jquery-ui.min.js"></script>
		<!-- wow js -->
        <script src="{{furl()}}/js/wow.min.js"></script>
		<!-- plugins js -->
        <script src="{{furl()}}/js/plugins.js"></script>
		<!-- main js -->
        <script src="{{furl()}}/js/main.js"></script>



<script type="text/javascript" src="{{furl()}}/seoera/parsley.js"></script>
@if(Request::segment(1) == 'ar')
<script type="text/javascript" src="{{furl()}}/seoera/i18n/ar.js"></script>
@else
<script type="text/javascript" src="{{furl()}}/seoera/i18n/en.js"></script>
@endif
<script type="text/javascript" src="{{furl()}}/seoera/toster/jquery.toast.min.js"></script>


    @if(session('message') !=  null )
    <script type="text/javascript">
        $.toast({
                    heading: 'Message',
                    text: "{{ session('message') }}",
                    position: 'top-right',
                    stack: false,
                    icon: 'info',
                    hideAfter: 10000 
                })
    </script>
    @endif

    @yield('script')

    <script type="text/javascript">
  



    // $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
   

    $("#subscribe-form").submit(function(e) 
    {
        e.preventDefault();

        // return false;
        var formData  = new FormData(jQuery('#subscribe-form')[0]);
        $.ajax({

           type:'POST',
           url:"{{route('front.post.contactus.subscribe')}}",
           data:formData,
           contentType: false,
           processData: false,
           success:function(data)
           {

             $("#errors-footer").html('');
             $("#errors-footer").append("<li class='alert alert-success text-center'>"+data.success+"</li>")
             $('.input-sub').val("");
           },
            error: function(xhr, status, error) 
            {
              $("#errors-footer").html('');
              $.each(xhr.responseJSON.errors, function (key, item) 
              {
                $("#errors-footer").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
              });
            }

        });

	  });




    $(document).on("click",".addToCart",function(e) 
    {

        e.preventDefault();

        // return false;
        var prodId = $(this).attr("data-proId");
        $.ajax({

           type:'POST',
           url:"{{route('front.post.cart.add')}}",
           data:{
            "_token": "{{ csrf_token() }}",
            "prodId": prodId },
           success:function(data)
           {
              if(data.success)
              {
                $.toast({
                    heading: 'Message',
                    text: data.success,
                    position: 'top-right',
                    stack: false,
                    icon: 'success',
                    hideAfter: 3000 
                })
              }
              else
              {
                 $("#cart-content").append(data);
                 var num = $(".header-middle-checkout").length;
                 $("#qCart span").text(num);


                 $.toast({
                    heading: 'Message',
                    text: "{{trans('frontSite.itemAddedToCart')}}",
                    position: 'top-right',
                    stack: false,
                    icon: 'success',
                    hideAfter: 3000 
                });

              }


           },
         

        });

    });




    $(document).on("click",".itemcartRemove",function(e) 
    {
        var itemId = $(this).attr("data-CartId");
        var el =$(this);
        
        $.ajax({

           type:'POST',
           url:"{{route('front.post.cart.remove')}}",
           data:{
            "_token": "{{ csrf_token() }}",
            "itemId": itemId },
           success:function(data)
           {
              if(data.success)
              {
                el.parents(".header-middle-checkout").remove();
                 var num = $(".header-middle-checkout").length;
                $("#qCart span").text(num);
                $.toast({
                    heading: 'Message',
                    text: data.success,
                    position: 'top-left',
                    stack: false,
                    icon: 'success',
                    hideAfter: 3000 
                })
              }
           }

        });

    });








</script>






    </body>

</html>