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
            <a href="{{ route('admin.get.order.show', ['id'=>$order->id]) }}" class="active-bread">@lang('site.orderNum') {{ $order->id }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.show')</span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->



<!-- END PAGE MESSAGE -->
@include('admin.msg._messages')

<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.show') (@lang('site.orderNum') {{ $order->id }}) </h3>
</div>



<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
       
            <div class="portlet-body">

                @if($orderContents->count())
               {{-- <form action="{{ route('admin.post.order.pending.deleteMulti') }}" method="post" id="Form2"> @csrf </form> --}}
                {{-- <button  class="btn btn-info btn-sm pull-right sort" type="submit" form="sortForm" >         @lang('site.sort')  --}}
                </button>
                        <table class="table table-striped table-bordered table-hover table-checkable table-sort order-column column" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> @lang('site.product') </th>
                                <th> @lang('site.quantity') </th>
                                <th> @lang('site.status') </th>
                                <th>  </th>


                            </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">
                            
                            @foreach($orderContents as $con)
                            <tr class="odd gradeX draggable-item" id="row-no-{{ $con->id }}">
                                <input type="hidden" name="sort[]" multiple value="{{ $con->id }}" form="sortForm">
                                <td class="text-center">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" name="deleteMulti[]" form="Form2" multiple value="{{ $con->id}}" />
                                        <span></span>
                                    </label>
                                </td>
                                <td class="text-center"> 
                                    {{ $con->product->name }}
                                </td>
                                <td class="text-center"> 
                                    {{ $con->quantity }} 
                                </td>
                                <td id="status-col-{{ $con->id }}" class="text-center status-col"> 
                                    {{ $con->status }} 
                                </td>
                                

                                <td class="text-center"> 
                                    <form method="post" class="status-form" id="status-{{ $con->id }}"> 
                                        @csrf 
                                        <input type="hidden" name="id" value="{{ $con->id }}">
                                        <button type="submit" id="status-btn" class="btn btn-danger btn-sm">
                                            change
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                            @endforeach

                        </tbody>
                        <hr>
                        
                    
                    </table>
                            
                
                        </form>
                    {{-- <button type="submit" class="btn btn-danger btn-sm item-checked" form="Form2">@lang('site.deleteChecked')</button> --}}
              
                    
              
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

{{-- <script type="text/javascript" src="{{aurl()}}/seoera/js/sortAndDataTable.js"></script> --}}

<script type="text/javascript">

  $.ajaxSetup({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  });

  $('.status-form').each(function(){
      $(this).submit(function(e){
          e.preventDefault();

          // return false;
          var formData  = new FormData(jQuery(this)[0]);
          var id = parseInt(formData.get("id"));
          
          $.ajax({
              type:'POST',
              url:"{{route('admin.get.order.contentStatus')}}",
              data:formData,
              contentType: false,
              processData: false,
              success:function(data)
              {
                  $('#status-col-'+id).html(data);
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
