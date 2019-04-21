@extends('admin.main')

@section('style')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{aurl()}}/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">


<link href="{{aurl()}}/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="{{aurl()}}/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="{{aurl()}}/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />


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
            <a href="{{ route('admin.get.subCategory.index') }}" class="active-bread">@lang('site.customers')</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.sub_categories')</span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->



<!-- END PAGE MESSAGE -->
@include('admin.msg._messages')

<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3>  @lang('site.sub_categories') ( @lang('site.videos') ) </h3>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
       
            <div class="portlet-body">
                <div class="table-toolbar">

                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-sm blue add-more" title=" @lang('site.moreVideos') ">
                                <i class="fa fa-plus"></i>
                            </button>
                            <hr>
                        </div>
                    </div>
                    <div class="row">

                        <form method="post" action="{{ route('admin.post.subCatVideo.moreVideo') }}" class=""  >
                            <input type="hidden" name="id" value="{{ $subCategory->id }}">
                            @csrf
                            @include('admin.msg._errors')


                            <div class="parent-duplicate">

                                <div class="form-body row duplicate">
                                    
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                            <label> @lang('site.embedLinkYoutube') </label>
                                            <b class="field-required">*</b>

                                            <div class="input-group">
                                                <span class="input-group-addon input-circle-left">
                                                    <i class="fa fa-image"></i>
                                                </span>
                                                <input type="text" name="link[]" multiple  class="form-control input-circle-right" required  > 
                                            </div>
                                        </div>
                                   </div>

                                    <div class="col-sm-12"><hr></div>

                                </div>

                            </div>

                            
                            <div class="form-actions">
                                <button type="submit" class="btn blue">@lang('site.add')</button>
                            </div>
                        </form>
                
                    </div>
                </div>




                @if($details->count())
                    
                        <table class="table table-striped table-bordered table-hover table-checkable table-sort order-column column" id="sample_1">
                        <thead>
                            <tr>
                                <th> @lang('site.sub_categories') </th>
                                <th> @lang('site.link') </th>
                                <th> @lang('site.delete') </th>
                            </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">
                            
                            @foreach($details as $detail)
                            <tr class="odd gradeX draggable-item">
                                <input type="hidden" name="sort[]" multiple value="{{ $detail->id }}" form="sortForm">
                                <td class="text-center"> {{ $detail->subCategory->name }} </td>
                                <td class="text-center"> {{ $detail->url_youtube }} </td>
                                <td class="text-center"> {{ $detail->date }} </td>
                                <td class="text-center">  
                                  <a href="{{ route('admin.get.subCatVideo.delete.video',$detail->id) }}" class="btn btn-sm red conform-delete" title="@lang('delete')"> @lang('site.delete') </a> 
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <hr>
                        
                    
                    </table>
                            


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

   

<script src="{{aurl()}}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="{{aurl()}}/seoera/js/sortAndDataTable.js"></script>

<script src="{{aurl()}}/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{aurl()}}/pages/scripts/components-date-time-pickers.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script type="text/javascript">

   

    // lengthDuplicate[0].addClass("fffffff");
    $(".add-more").click(function()
    {
        $(".duplicate").eq(0).clone().appendTo(".parent-duplicate");
        $(".duplicate:last").prepend('<div class="col-sm-12">'+
            '<a class="btn btn-danger pull-right remove-item"> <i class="fa fa-times"></i> </a>'+
        '</div>')

        
    });


    $('body').on('focus',".date-picker", function(){
    $(this).datepicker({
                rtl: App.isRTL(),
                orientation: "left",
                autoclose: true,
                format: 'yyyy-mm-dd',
            });
    });


    $('body').on('click',".remove-item", function()
    {   
        el = $(this);
        $(this).parents('.duplicate').slideUp('2000',function(){
            el.parents('.duplicate').remove();
        });
    });
  




</script>


@endsection