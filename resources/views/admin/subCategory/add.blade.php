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
            <a href="{{ route('admin.get.category.index') }}" class="active-bread">@lang('site.sub_categories')</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.add')</span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->





<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.addItem')  ( @lang('site.sub_categories') ) </h3>
</div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.addItem') </span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.post.subCategory.store') }}" enctype="multipart/form-data">
                        <div class="form-body row">
                           @csrf
                             @include('admin.msg._errors')

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.category') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <select class="form-control" name="category_id" required>
                                                <option value="">@lang('site.choose')</option>
                                           @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" @if(old('category_id')) {{ printSelect($cat->id,old('category_id')) }} @endif >{{ $cat->name }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right" required value="{{ old('name') }}"> </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label> @lang('site.image') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                    <input type="file" name="img" accept="image/*" onchange="loadFile(event)" class="form-control input-circle-right" required  /> 
                                    </div>
                                </div>
                           </div>



                           <div class="col-sm-6">
                               <div class="form-group">
                                    <label> @lang('site.pdf') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                    <input type="file" name="pdf"  class="form-control input-circle-right" required  /> 
                                    </div>
                                </div>
                           </div>

                           <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.showInHomePage') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <select class="form-control" name="show_in_homePage" required>
                                            <option value="no"  old('show_in_homePage') == 'no' : 'selected' ? '' >@lang('site.no')</option>
                                            <option value="yes" old('show_in_homePage') == 'yes' : 'selected' ? ''>@lang('site.yes')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                           <div class="col-sm-12">
                               <div class="form-group">
                                   <img id="output" class="privew-image"  />
                               </div>
                           </div>

     

                            



                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.description') </label>
                              
                                        <textarea required class="form-control ckeditor" name="description" rows="5">{!! old('description') !!}</textarea>
                                   
                                </div>
                           </div>


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.slug')  /  @lang('site.seo')  </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="slug" class="form-control input-circle-right "   value="{{ old('slug') }}"> </div>
                                </div>
                           </div>


                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn blue">@lang('site.add')</button>
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



