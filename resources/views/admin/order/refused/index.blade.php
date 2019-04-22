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
            <a href="{{ route('admin.get.order.refused.index') }}" class="active-bread">@lang('site.refusedOrders')</a>
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
    <h3> @lang('site.view') ( @lang('site.refusedOrders') ) </h3>
</div>



<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
       
            <div class="portlet-body">

                @if($orders->count())
               <form action="{{ route('admin.post.order.deleteMulti') }}" method="post" id="Form2"> @csrf </form>
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
                                <th> @lang('site.orderId') </th>
                                <th> @lang('site.name') </th>
                                <th> @lang('site.code') </th>
                                <th> @lang('site.actions') </th>
                                <th> </th>


                            </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">
                            
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

@endsection
