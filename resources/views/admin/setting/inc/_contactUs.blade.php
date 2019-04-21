

        <div class="form-body row">


          <div class="col-sm-12">
            <div>
              <hr>
                <h3>@lang('site.contactUsPage')</h3>
              <hr>
            </div>
          </div>

          <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="contactUs_workH" 
                        class="form-control input-circle-right count-text-meta-title"  
                        value="{{ json_data($site_content,'contactUs_workH') }}"  
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
                        <textarea type="text" name="contactUs_workHContent" 
                        class="form-control input-circle-right count-text-meta-title"  
                          rows="3" >{{ strip_tags(json_data($site_content,'contactUs_workHContent') ) }}</textarea> 
                    </div>
                </div>
           </div>


        </div>
















