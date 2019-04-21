


        <div class="form-body row">


          <div class="col-sm-12">
            <div>
              <hr>
                <h3>@lang('site.footer')</h3>
              <hr>
            </div>
          </div>

          <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="footer_head1" 
                        class="form-control input-circle-right count-text-meta-title"  
                        value="{{ json_data($site_content,'footer_head1') }}"  
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
                        <input type="text" name="footer_head2" 
                        class="form-control input-circle-right count-text-meta-title"  
                        value="{{ json_data($site_content,'footer_head2') }}"  
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
                        <input type="text" name="footer_head3" 
                        class="form-control input-circle-right count-text-meta-title"  
                        value="{{ json_data($site_content,'footer_head3') }}"  
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
                        <input type="text" name="footer_head4" 
                        class="form-control input-circle-right count-text-meta-title"  
                        value="{{ json_data($site_content,'footer_head4') }}"  
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
                        <textarea type="text" name="footer_desc" 
                        class="form-control input-circle-right count-text-meta-title"  
                          rows="3" >{{ strip_tags(json_data($site_content,'footer_desc') ) }}</textarea> 
                    </div>
                </div>
           </div>



        </div>
















