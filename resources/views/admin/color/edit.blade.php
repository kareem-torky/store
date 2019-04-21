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
            <a href="{{ route('admin.get.color.index') }}" class="active-bread">@lang('site.color')</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.edit')</span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->





<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.editItem') ( @lang('site.color') ) </h3>
</div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.editItem') </span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.put.color.update') }}"  enctype="multipart/form-data">
                        <div class="form-body row">
                           @csrf
                           {{ method_field('PUT') }}
                            @include('admin.msg._errors')

                           <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.title') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="title" class="form-control input-circle-right" placeholder="Title" required value="{{ $row->title }}"> 
                                        <input type="hidden" name="id" value="{{ $row->id }}"  >
                                    </div>
                                </div>
                            </div>

                           <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.color') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="color" id="palette" name="color" class="form-control input-circle-right" required value="{{ $row->color }}"> 
                                        <input type="hidden" name="id" value="{{ $row->id }}"  >
                                    </div>
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
