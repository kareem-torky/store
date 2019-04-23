@extends('admin.main')

@section('style')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{aurl()}}/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection

@section('content')



<!-- BEGIN PAGE BAR -->
<div class="page-bar">


    <ul class="page-breadcrumb">
        <li>
            <a href="{{ route('admin.get.home.index') }}" class="active-bread">@lang('site.home')</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.get.order.shipping.index') }}" class="active-bread">@lang('site.shipping')</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.view')</span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->



<!-- END PAGE MESSAGE -->
@include('admin.msg._messages')

<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.view') ( @lang('site.shipping') ) </h3>
</div>


<div class="modal fade" id="refuse-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Add a note before refusal</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" id="refuse-form-hidden" name="id" value="" form="refuse-form">
                <textarea class="form-control count-text-desc-keywords" name="refused_notes" rows="4" form="refuse-form" required></textarea>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-lg" form="refuse-form">
                        @lang('site.submit')
                </button>
            </div>
        </div>
    </div>
</div>





<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
       
            <div class="portlet-body">

                @if($orders->count())
               <form action="{{ route('admin.post.order.deleteMulti') }}" method="post" id="Form2"> @csrf </form>
                </button>
                <form method="post" id="refuse-form"> @csrf </form> 

                        <table class="table table-striped table-bordered table-hover table-checkable table-sort order-column column" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> @lang('site.orderId') </th>
                                <th> @lang('site.name') </th>
                                <th> @lang('site.code') </th>
                                <th> @lang('site.actions') </th>
                                <th> </th>


                            </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">
                            <div class="coverLoading" style="width: 50px;"><img src="{{furl()}}/img/loading.gif"></div>
                            
                            @foreach($orders as $order)
                            
                            <tr class="odd gradeX draggable-item" id="row-no-{{ $order->id }}">
                                <input type="hidden" name="sort[]" multiple value="{{ $order->id }}" form="sortForm">
                                <td class="text-center">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" name="deleteMulti[]" form="Form2" multiple value="{{ $order->id}}" />
                                        <span></span>
                                    </label>
                                </td>
                                <td class="text-center"> 
                                    {{ $order->id }} 
                                </td>
                                <td class="text-center"> 
                                    @if($order->name !== null)
                                        {{ $order->name }}
                                    @else 
                                        No name available 
                                    @endif
                                </td>
                                <td class="text-center"> 
                                    {{ $order->code }} 
                                </td>

                                <td class="text-center">

                                    <a href="{{ route('admin.get.order.show', ['id'=>$order->id]) }}" class="btn btn-info btn-sm" title="@lang('site.show')">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                
                                    <a href="{{ route('admin.get.order.delete', ['id'=>$order->id]) }}" class="conform-delete btn btn-danger btn-sm" title="@lang('site.delete')">
                                            <i class="fa fa-close"></i>
                                    </a>
                        
                                </td>
                                
                                
                                <td class="text-center"> 
                                        <form method="post" class="accept-form" id="accept-{{ $order->id }}"> 
                                            @csrf 
                                            <input type="hidden" name="id" value="{{ $order->id }}">
                                            
                                        </form>

                                        <form method="post" class="cancelled-form" id="cancelled-{{ $order->id }}"> 
                                                @csrf 
                                                <input type="hidden" name="id" value="{{ $order->id }}">
                                            </form>

                                        <button type="submit" class="btn btn-primary btn-sm" form="accept-{{ $order->id }}" onclick="return confirm('Confirm accepting the order ?');">
                                                @lang('site.accept')
                                        </button>

                                        <button type="button" class="btn btn-danger btn-sm refuse-btn" data-toggle="modal" data-target="#refuse-modal" value="{{ $order->id }}">
                                                @lang('site.refuse')
                                        </button>

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm shipping the order ?');" form="cancelled-{{ $order->id }}">
                                                @lang('site.cancel')
                                            </button>

                                </td>
                                            
                            </tr>
                            @endforeach

                        </tbody>
                        <hr>
                        
                    
                    </table>
                            
                
                        </form>
                    <button type="submit" class="btn btn-danger btn-sm item-checked" form="Form2">@lang('site.deleteChecked')</button>
                    <button  class="btn btn-info btn-sm pull-right sort" type="submit" form="sortForm" >         @lang('site.sort') 
              
                    
              
            <!-- end form  -->

                @else
                        
                        @include('admin.msg.notFound')
                
                @endif



            </div>

    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>



@endsection



@section('script')

   

{{-- <script src="{{aurl()}}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> --}}
<!-- END PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="{{aurl()}}/seoera/js/sortAndDataTable.js"></script>

<script type="text/javascript">
  
    $(".coverLoading").css("display","none");

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $('.accept-form').each(function(){
        $(this).submit(function(e){
            e.preventDefault();

            // return false;
            var formData  = new FormData(jQuery(this)[0]);
            var id = parseInt(formData.get("id"));
            
            $.ajax({
                type:'POST',
                url:"{{route('admin.post.order.shipping.toAccepted')}}",
                data:formData,
                contentType: false,
                processData: false,
                beforeSend:function()
                {
                    $(".coverLoading").css("display","block");
                    $("#sample_1").css("visibility","hidden");
                },
                success:function(data)
                {
                    $(".coverLoading").css("display","none");
                    $("#sample_1").css("visibility","visible");
                    $('#row-no-'+id).hide();
                },
                error: function(xhr, status, error) 
                {
                    console.log(error);
                    $("#errors").html('');
                    $.each(xhr.responseJSON.errors, function (key, item) 
                    {
                        $("#errors").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
                    });

                }

            });
        })
    })

    $('.refuse-btn').each(function(){
        $(this).click(function(){
            $('#refuse-form-hidden').val($(this).val());
        })
    })

    $('#refuse-form').submit(function(e){
        e.preventDefault();

        $('#refuse-modal').modal('toggle');


        // return false;
        var formData  = new FormData(jQuery(this)[0]);
        var id = parseInt(formData.get("id"));
        
        $.ajax({
            type:'POST',
            url:"{{route('admin.post.order.shipping.toRefused')}}",
            data:formData,
            contentType: false,
            processData: false,
            beforeSend:function()
            {
                $(".coverLoading").css("display","block");
                $("#sample_1").css("visibility","hidden");
            },
            success:function(data)
            {
                $(".coverLoading").css("display","none");
                $("#sample_1").css("visibility","visible");
                $('#row-no-'+id).hide();
            },
            error: function(xhr, status, error) 
            {
                console.log(error);
                $("#errors").html('');
                $.each(xhr.responseJSON.errors, function (key, item) 
                {
                    $("#errors").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
                });

            }

        });
    })

    $('.cancelled-form').each(function(){
        $(this).submit(function(e){
            e.preventDefault();

            // return false;
            var formData  = new FormData(jQuery(this)[0]);
            var id = parseInt(formData.get("id"));
            
            $.ajax({
                type:'POST',
                url:"{{route('admin.post.order.toCancelled')}}",
                data:formData,
                contentType: false,
                processData: false,
                beforeSend:function()
                {
                    $(".coverLoading").css("display","block");
                    $("#sample_1").css("visibility","hidden");
                },
                success:function(data)
                {
                    $(".coverLoading").css("display","none");
                    $("#sample_1").css("visibility","visible");
                    $('#row-no-'+id).hide();
                },
                error: function(xhr, status, error) 
                {
                    console.log(error);
                    $("#errors").html('');
                    $.each(xhr.responseJSON.errors, function (key, item) 
                    {
                        $("#errors").append("<li class='alert alert-danger show-errors'>"+item+"</li>")
                    });

                }

            });
        })
    })

   
</script>


@endsection
