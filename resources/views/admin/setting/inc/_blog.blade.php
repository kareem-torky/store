

        <div class="form-body row">


          <div class="col-sm-12">
            <div>
              <hr>
                <h3>@lang('site.blogPageData')</h3>
              <hr>
            </div>
          </div>

          <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="blog_title" class="form-control input-circle-right count-text-meta-title" 
                         value="{{ json_data($site_content,'blog_title') }}"  
                        > 
                    </div>
                </div>
           </div>

           <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <textarea type="text" name="blog_desc" 
                        class="form-control input-circle-right count-text-meta-title"  
                          rows="3" >{{ strip_tags(json_data($site_content,'blog_desc') ) }}</textarea> 
                    </div>
                </div>
           </div>



		 



        </div>
















