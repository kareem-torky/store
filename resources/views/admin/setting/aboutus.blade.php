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
            <span>@lang('site.aboutUsPage')</span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->





<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.settings') ( @lang('site.aboutUsPage') ) </h3>
</div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">


                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.aboutUsPage') </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.post.settings.updateaboutus') }}" enctype="multipart/form-data" class="">

                        <div class="form-body row">
                           @csrf
                            @include('admin.msg._errors')
                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="aboutUsTitle" class="form-control input-circle-right"  required value="{{ seoData($aboutus,'aboutUsTitle') }}"> 
                                        <input type="hidden" name="id" value="{{ $about->id }}">
                                      </div>
                                </div>
                           </div>

                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.smallDescription') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea type="text" name="aboutUsSmallDescription" class="form-control input-circle-right"  required rows="5" >{{ seoData($aboutus,'aboutUsSmallDescription') }}</textarea> 
                                        </div>
                                </div>
                           </div>



                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.image') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <input type="file" name="img1" accept="image/*"  class="form-control input-circle-right"  > </div>
                                </div>
                           </div>


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.description') </label>
                              
                                        <textarea required class="form-control ckeditor" name="aboutUsDescription" rows="5">{{ seoData($aboutus,'aboutUsDescription') }}</textarea>
                                   
                                </div>
                           </div>


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.slug')  /  @lang('site.seo')  </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="aboutUsSlug" class="form-control input-circle-right "   value="{{ seoData($aboutus,'aboutUsSlug') }}"> </div>
                                </div>
                           </div>

                        </div>

                        
                        <div class="form-actions">
                            <button type="submit" class="btn blue">@lang('site.save')</button>
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


