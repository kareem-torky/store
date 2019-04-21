@extends('admin.main')

@section('style')

<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{aurl()}}/pages/css/faq.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->


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
            <a href="{{ route('admin.get.staticPage.index') }}" class="active-bread">@lang('site.staticPage')</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.question') ( {{ $page->name }} ) </span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->



<!-- END PAGE MESSAGE -->
@include('admin.msg._messages')

<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.view') ( @lang('site.question') ) ( {{ $page->name }} ) </h3>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
       
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <form role="form" method="post" action="{{ route('admin.post.questionPage.store') }}" enctype="multipart/form-data" class="">

                        <div class="form-body row">
                           @csrf
                            @include('admin.msg._errors')
                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.question') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="question" class="form-control input-circle-right" placeholder="@lang('site.question')" required value="{{ old('question') }}"> </div>
                                        <input type="hidden" name="page_id" value="{{ $page->id }}">
                                </div>
                           </div>


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.answer') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea required class="form-control " name="answer" rows="5">{{old('answer') }}</textarea>
                                        
                                    </div>
                                    
                                </div>
                           </div>

                        </div>

                        
                        <div class="form-actions">
                            <button type="submit" class="btn blue">@lang('site.add')</button>
                        </div>
                    </form>
                    </div>
                </div>
                



                @if($questions->count())


               <form action="{{ route('admin.post.questionPage.deleteMulti') }}" method="post" id="Form2"> @csrf </form>
               <form action="{{ route('admin.post.questionPage.sort') }}" method="post" id="sortForm">@csrf</form>
                    


                     <!-- END PAGE HEADER-->
                        <div class="faq-page faq-content-1">
                          
                            <div class="faq-content-container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="faq-section ">
                                            <h2 class="faq-title uppercase font-blue">{{ $page->name  }}</h2>
                                            <div class="panel-group accordion faq-content" id="accordion1">

                                                @foreach($questions as $ques)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-circle"></i>
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#{{ $ques->id }}">
                                                             {{ $ques->question }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="{{ $ques->id }}" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p> {{ $ques->answer }}</p>
                                                            <hr>
                                                            <div class="btn-group">
                                                                <button class="btn btn-sm green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> @lang('site.actions')
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu pull-left" role="menu">

                                                                    {!!show_potions('questionPage',$ques->id,$ques->status)!!}
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                @endforeach
                                              
                                            </div>
                                        </div>
                                   
                                    </div>
                                  
                                </div>
                            </div>
                        </div>




                    <table class="table table-striped table-bordered table-hover table-checkable table-sort order-column column" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                <span></span>
                                            </label>
                                        </th>
                                        <th> @lang('site.question') </th>

                                    </tr>
                                </thead>
                                <tbody class="connected-sortable droppable-area1">
                                    
                                    @foreach($questions as $ques)
                                    <tr class="odd gradeX draggable-item">
                                        <input type="hidden" name="sort[]" multiple value="{{ $ques->id }}" form="sortForm">
                                        <td class="text-center">
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" name="deleteMulti[]" form="Form2" multiple value="{{ $ques->id}}" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td class="text-center"> {{ $ques->question }} </td>
                                        <!-- <td class="text-center"> {{-- $ques->answer --}} </td> -->
                                       
                                    </tr>
                                    @endforeach

                                </tbody>
                                <hr>
                                
                            
                    </table>
                            
                       
               


                    <button type="submit" class="btn btn-danger btn-sm item-checked" form="Form2">@lang('site.deleteChecked')</button>
              
                    <button  class="btn btn-info btn-sm pull-right sort" type="submit" form="sortForm" > @lang('site.sort') </button>
              
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

   


<script src="{{aurl()}}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="{{aurl()}}/seoera/js/sortAndDataTable.js"></script>


@endsection