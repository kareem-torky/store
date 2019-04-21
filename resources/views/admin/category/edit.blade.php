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
            <a href="{{ route('admin.get.category.index') }}" class="active-bread">@lang('site.category')</a>
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
    <h3> @lang('site.editItem') ( @lang('site.category') ) </h3>
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
                    <form role="form" method="post" action="{{ route('admin.put.category.update') }}"  enctype="multipart/form-data">
                        <div class="form-body row">
                           @csrf
                           {{ method_field('PUT') }}
                            @include('admin.msg._errors')

                           <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right" placeholder="Name" required value="{{ $row->name }}"> 
                                        <input type="hidden" name="id" value="{{ $row->id }}"  >
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label> @lang('site.image') (240 x 222)  </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <input type="file" name="img" accept="image/*" onchange="loadFile(event)" class="form-control input-circle-right" > </div>
                                </div>
                           </div>


                           <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.showInHomePage') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <select class="form-control" name="show_in_homePage" required>
                                            <option value="no" @if($row->show_in_homePage == 'no') {{ 'selected' }} @endif >@lang('site.no')</option>
                                            <option value="yes" @if($row->show_in_homePage == 'yes') {{ 'selected' }} @endif >@lang('site.yes')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            

                           <div class="col-sm-12">
                               <div class="form-group">
                                   <img id="output" class="privew-image" @if($row->img) src="  {{ getImage(CATEGORY_PATH.$row->img) }}"  @endif />
                               </div>
                           </div>



                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.smallDescription') <span class="label label-success"></span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea class="form-control count-text-desc-keywords" name="small_description" rows="4"> {{ $row->small_description }} </textarea>
                                       
                                    </div>
                                </div>
                           </div>




                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.description') </label>
                              
                                        <textarea required class="form-control ckeditor" name="description" rows="5">{!! $row->description !!}</textarea>
                                   
                                </div>
                           </div>


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.slug')  /  @lang('site.seo')  </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="slug" class="form-control input-circle-right "   value="{{ $row->slug }}"> </div>
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


