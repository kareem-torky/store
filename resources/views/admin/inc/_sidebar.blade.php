                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">

                    <div class="page-sidebar navbar-collapse collapse">
         
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <li class="sidebar-search-wrapper">
                                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                             
                            </li>
                            <li class="nav-item start {{ sidebar_base('')  }} ">
                                <a href="{{ route('admin.get.home.index') }}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">@lang('site.dashboard')</span>
                              
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase"> @lang('site.content') </h3>
                            </li>


                            <li class="nav-item {{ sidebar_base('settings')  }}  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-cogs"></i>
                                    <span class="title">@lang('site.settings')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('settings','base')  }}">
                                        <a href="{{ route('admin.get.settings.base') }}" class="nav-link ">
                                            <span class="title">@lang('site.base')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('settings','seo')  }} ">
                                        <a href="{{ route('admin.get.settings.seo') }}" class="nav-link ">
                                            <span class="title">@lang('site.seo')</span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ sidebar_base('settings','site')  }} ">
                                        <a href="{{ route('admin.get.settings.siteContent') }}" class="nav-link ">
                                            <span class="title">@lang('site.siteContent')</span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ sidebar_base('settings','aboutus')  }} ">
                                        <a href="{{ route('admin.get.settings.aboutus') }}" class="nav-link ">
                                            <span class="title">@lang('site.aboutUsPage')</span>
                                        </a>
                                    </li>


                               
                                </ul>
                            </li>






                            <li class="nav-item {{ sidebar_base('slider')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-sliders"></i>
                                    <span class="title">@lang('site.slider')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('slider','add')  }}">
                                        <a href="{{ route('admin.get.slider.add') }}" class="nav-link ">
                                            <span class="title">@lang('site.add')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('slider','all')  }} ">
                                        <a href="{{ route('admin.get.slider.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>



                            <li class="nav-item {{ sidebar_base('category')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-bars"></i>
                                    <span class="title">@lang('site.categories')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('category','add')  }}">
                                        <a href="{{ route('admin.get.category.add') }}" class="nav-link ">
                                            <span class="title">@lang('site.add')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('category','all')  }} ">
                                        <a href="{{ route('admin.get.category.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>

                            <li class="nav-item {{ sidebar_base('subCategory')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-cube"></i>
                                    <span class="title">@lang('site.sub_categories')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('subCategory','add')  }}">
                                        <a href="{{ route('admin.get.subCategory.add') }}" class="nav-link ">
                                            <span class="title">@lang('site.add')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('subCategory','all')  }} ">
                                        <a href="{{ route('admin.get.subCategory.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item {{ sidebar_base('gov')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-map-marker"></i>
                                    <span class="title">@lang('site.govs')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('gov','add')  }}">
                                        <a href="{{ route('admin.get.gov.add') }}" class="nav-link ">
                                            <span class="title">@lang('site.add')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('gov','all')  }} ">
                                        <a href="{{ route('admin.get.gov.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>







                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                    <span class="title">@lang('site.products')</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-settings"></i>@lang('site.sizes')
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="{{ route('admin.get.size.add') }}" class="nav-link">
                                                    <i class="fa fa-arrow-right"></i> @lang('site.add')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('admin.get.size.index') }}" class="nav-link">
                                                    <i class="fa fa-arrow-right"></i> @lang('site.view') </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-settings"></i>@lang('site.colors')
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="{{ route('admin.get.color.add') }}" class="nav-link">
                                                    <i class="fa fa-arrow-right"></i> @lang('site.add')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('admin.get.color.index') }}" class="nav-link">
                                                    <i class="fa fa-arrow-right"></i> @lang('site.view') </a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-plus"></i>@lang('site.addProduct') 
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-eye"></i>@lang('site.viewProduct') </a>
                                    </li>
                                    
                                </ul>
                            </li>


                            <li class="nav-item {{ sidebar_base('orders')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-sort"></i>
                                    <span class="title">@lang('site.orders')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.get.order.pending.index') }}" class="nav-link">
                                            <i class="fa fa-arrow-right"></i>@lang('site.pending') 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.get.order.shipping.index') }}" class="nav-link">
                                            <i class="fa fa-arrow-right"></i>@lang('site.shipping') 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.get.order.cancelled.index') }}" class="nav-link">
                                            <i class="fa fa-arrow-right"></i>@lang('site.cancelled') 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.get.order.accepted.index') }}" class="nav-link">
                                            <i class="fa fa-arrow-right"></i>@lang('site.accepted') 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.get.order.refused.index') }}" class="nav-link">
                                            <i class="fa fa-arrow-right"></i>@lang('site.refused') 
                                        </a>
                                    </li>
                                 

                                </ul>
                            </li>





                             <li class="nav-item {{ sidebar_base('service')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-diamond"></i>
                                    <span class="title">@lang('site.services')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('service','add')  }}">
                                        <a href="{{ route('admin.get.service.add') }}" class="nav-link ">
                                            <span class="title">@lang('site.add')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('service','all')  }} ">
                                        <a href="{{ route('admin.get.service.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>


                             <li class="nav-item {{ sidebar_base('brand')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-bullseye"></i>
                                    <span class="title">@lang('site.brand')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('brand','add')  }}">
                                        <a href="{{ route('admin.get.brand.add') }}" class="nav-link ">
                                            <span class="title">@lang('site.add')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('brand','all')  }} ">
                                        <a href="{{ route('admin.get.brand.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>





                             <li class="nav-item {{ sidebar_base('blog')  }} {{ sidebar_base('questionPage')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-rss"></i>
                                    <span class="title">@lang('site.blog')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('blog','add')  }}">
                                        <a href="{{ route('admin.get.blog.add') }}" class="nav-link ">
                                            <span class="title">@lang('site.add')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('blog','all')  }} ">
                                        <a href="{{ route('admin.get.blog.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>




                            <li class="nav-item {{ sidebar_base('staticPage')  }} {{ sidebar_base('questionPage')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-square"></i>
                                    <span class="title">@lang('site.staticPage')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('staticPage','add')  }}">
                                        <a href="{{ route('admin.get.staticPage.add') }}" class="nav-link ">
                                            <span class="title">@lang('site.add')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('staticPage','all')  }} ">
                                        <a href="{{ route('admin.get.staticPage.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>



                            <li class="nav-item {{ sidebar_base('newsletter') }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="title">@lang('site.newsletter')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('newsletter','all')  }} ">
                                        <a href="{{ route('admin.get.newsletter.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>


                            <li class="nav-item {{ sidebar_base('message') }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="title">@lang('site.messages')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('message','all')  }} ">
                                        <a href="{{ route('admin.get.message.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>






                             <li class="nav-item {{ sidebar_base('admin')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-users"></i>
                                    <span class="title">@lang('site.admins')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ sidebar_base('admin','add')  }}">
                                        <a href="{{ route('admin.get.admin.add') }}" class="nav-link ">
                                            <span class="title">@lang('site.add')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ sidebar_base('admin','all')  }} ">
                                        <a href="{{ route('admin.get.admin.index') }}" class="nav-link ">
                                            <span class="title">@lang('site.view')</span>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>

                            <li class="nav-item {{ sidebar_base('customer')  }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-male"></i>
                                    <span class="title">@lang('site.customers')</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-eye"></i> @lang('site.view') </a>
                                    </li>
                               
                                </ul>
                            </li>











                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->


                 <!-- BEGIN CONTENT -->
                    <div class="page-content-wrapper">
                        <!-- BEGIN CONTENT BODY -->
                        <div class="page-content">
                            <!-- BEGIN PAGE HEADER-->
                            <!-- BEGIN THEME PANEL -->
                          
                            <!-- END THEME PANEL -->
