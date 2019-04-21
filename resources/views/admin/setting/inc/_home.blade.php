



        <div class="form-body row">
           @csrf
           @include('admin.msg._errors')

          <div class="col-sm-12">
            <div>
              <hr>
                <h3>@lang('site.section1')</h3>
              <hr>
            </div>
          </div>

          <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="section1_head" class="form-control input-circle-right count-text-meta-title"  
                        value="{{ json_data($site_content,'section1_head') }}"  
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
                        <input type="text" name="section1_small_desc" class="form-control input-circle-right count-text-meta-title"  
                        value="{{ json_data($site_content,'section1_small_desc') }}"  
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
                        <textarea type="text" name="section1_desc" 
                        class="form-control input-circle-right count-text-meta-title"  
                          rows="5" >{{ strip_tags(json_data($site_content,'section1_desc') ) }}</textarea> 
                    </div>
                </div>
           </div>


           <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="file" name="section1_img" 
                        class="form-control input-circle-right count-text-meta-title"   > 
                    </div>
                </div>
           </div>
         
         




           <div class="col-sm-12">
            <div>
              <hr>
                <h3>@lang('site.section2')</h3>
              <hr>
            </div>
          </div>

          <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="section2_head" class="form-control input-circle-right count-text-meta-title" 
                        value="{{ json_data($site_content,'section2_head') }}"   
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
                        <input type="text" name="section2_desc" class="form-control input-circle-right count-text-meta-title" 
                        value="{{ json_data($site_content,'section2_desc') }}"   
                        > 
                    </div>
                </div>
           </div>




            <div class="col-sm-12">
            <div>
              <hr>
                <h3>@lang('site.section3')</h3>
              <hr>
            </div>
          </div>

          <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="section3_head" class="form-control input-circle-right count-text-meta-title"
                         value="{{ json_data($site_content,'section3_head') }}"   
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
                        <input type="text" name="section3_desc" class="form-control input-circle-right count-text-meta-title" 
                         value="{{ json_data($site_content,'section3_desc') }}"  
                        > 
                    </div>
                </div>
           </div>


           <div class="col-sm-12">
            <div>

              <hr>
            </div>
          </div>






           <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="section3_icon1" class="form-control input-circle-right count-text-meta-title"
                         value="{{ json_data($site_content,'section3_icon1') }}"   
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
                        <input type="text" name="section3_titleIcon1" class="form-control input-circle-right count-text-meta-title" 
                         value="{{ json_data($site_content,'section3_titleIcon1') }}"  
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
                        <textarea type="text" name="section3_descIcon1" 
                        class="form-control input-circle-right count-text-meta-title"  
                          rows="3" >{{ strip_tags(json_data($site_content,'section3_descIcon1') ) }}</textarea> 
                    </div>
                </div>
           </div>






           <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="section3_icon2" class="form-control input-circle-right count-text-meta-title"
                         value="{{ json_data($site_content,'section3_icon2') }}"   
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
                        <input type="text" name="section3_titleIcon2" class="form-control input-circle-right count-text-meta-title" 
                         value="{{ json_data($site_content,'section3_titleIcon2') }}"  
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
                        <textarea type="text" name="section3_descIcon2" 
                        class="form-control input-circle-right count-text-meta-title"  
                          rows="3" >{{ strip_tags(json_data($site_content,'section3_descIcon2') ) }}</textarea> 
                    </div>
                </div>
           </div>





           <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="section3_icon3" class="form-control input-circle-right count-text-meta-title"
                         value="{{ json_data($site_content,'section3_icon3') }}"   
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
                        <input type="text" name="section3_titleIcon3" class="form-control input-circle-right count-text-meta-title" 
                         value="{{ json_data($site_content,'section3_titleIcon3') }}"  
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
                        <textarea type="text" name="section3_descIcon3" 
                        class="form-control input-circle-right count-text-meta-title"  
                         rows="3" >{{ strip_tags(json_data($site_content,'section3_descIcon3') ) }}</textarea> 
                    </div>
                </div>
           </div>




           <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="section3_icon4" class="form-control input-circle-right count-text-meta-title"
                         value="{{ json_data($site_content,'section3_icon4') }}"   
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
                        <input type="text" name="section3_titleIcon4" class="form-control input-circle-right count-text-meta-title" 
                         value="{{ json_data($site_content,'section3_titleIcon4') }}"  
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
                        <textarea type="text" name="section3_descIcon4" 
                        class="form-control input-circle-right count-text-meta-title"  
                          rows="3" >{{ strip_tags(json_data($site_content,'section3_descIcon3') ) }}</textarea> 
                    </div>
                </div>
           </div>





           <div class="col-sm-12">
            <div>
              <hr>
                <h3>@lang('site.section4')</h3>
              <hr>
            </div>
          </div>

          <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="section4_head" class="form-control input-circle-right count-text-meta-title" 
                        value="{{ json_data($site_content,'section4_head') }}"   
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
                        <input type="text" name="section4_desc" class="form-control input-circle-right count-text-meta-title" 
                        value="{{ json_data($site_content,'section4_desc') }}"   
                        > 
                    </div>
                </div>
           </div>







           <div class="col-sm-12">
            <div>
              <hr>
                <h3>@lang('site.section5')</h3>
              <hr>
            </div>
          </div>

          <div class="col-sm-12">
               <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-text-width"></i>
                        </span>
                        <input type="text" name="section5_head" class="form-control input-circle-right count-text-meta-title" 
                        value="{{ json_data($site_content,'section5_head') }}"   
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
                        <input type="text" name="section5_desc" class="form-control input-circle-right count-text-meta-title" 
                        value="{{ json_data($site_content,'section5_desc') }}"   
                        > 
                    </div>
                </div>
           </div>










        </div>

















