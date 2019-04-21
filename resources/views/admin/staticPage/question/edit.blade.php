@extends('admin.main')



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
            <a href="{{ route('admin.get.questionPage.add',$page->id) }}" class="active-bread">
            @lang('site.question') ( {{ $page->name }} ) </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.editQuestion')  </span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->





<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.editQuestion') ( @lang('site.question') ) </h3>
</div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.editQuestion') </span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.put.questionPage.update') }}"  >
                        <div class="form-body row">
                           @csrf
                           {{ method_field('PUT') }}
                            @include('admin.msg._errors')

                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.question') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="question" class="form-control input-circle-right" placeholder="@lang('site.question')" required value="{{ $row->question }}"> </div>
                                        <input type="hidden" name="page_id" value="{{ $page->id }}">
                                        <input type="hidden" name="question_id" value="{{ $row->id }}">
                                </div>
                           </div>


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.answer') </label>
                                    <textarea required class="form-control " name="answer" rows="5">{{$row->answer }}</textarea>
                                </div>
                           </div>

            


                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn red">@lang('site.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection



@section('script')

    <script src="{{ aurl() }}/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

@endsection


