<?php 



// return object of admin if authinicated 
// 
// ( function adminAuth() => this function return object of admin if he is authunicated ) 
if (!function_exists('adminAuth')) 
{
    function adminAuth()
    {
        return auth()->guard('admin');
    }
}




// define link for assets of admin ( styles and scripts )
if (!function_exists('aurl')) 
{
    function aurl()
    {
         return url('admin');
    }
}




// define link for assets of admin ( AR ) ( styles and scripts )

if (!function_exists('aurl_ar')) 
{
    function aurl_ar()
    {
         return url('admin/ar');
    }
}



//  make links of sidebar active 
if (!function_exists('sidebar_base')) 
{
    function sidebar_base($segment,$child_menu = null)
    {

        // second link  ( like add or view)
        if($child_menu)
        {
            if(Request::segment('3') == $segment && Request::segment('4') == $child_menu)
             {
                return "active";
             }
        }// end secind link
        else
        {
            // first link link ( like categories or products)
            if(Request::segment('3') == $segment)
            {
                return "active";
            }
         
        } // end second link

    } // end function
}


//  make links of menubar active  ( in front )
if (!function_exists('active_link')) 
{
    function active_link($segment,$n=null)
    {
        if($n)
        {
            if(Request::segment($n) == $segment)
             {
                return "active";
             }
        }
        else
        {
            if(Request::segment('2') == $segment)
             {
                return "active";
             }
        }
        
  

    } // end function
}


// language id 
if (!function_exists('language')) 
{
    function language()
    {
        return  adminAuth()->user()->language_id;
    }
}







//  prent selected if arent of select == chield at another row in table
if (!function_exists('printSelect')) 
{
    function printSelect($parent,$child) 
    {
        if($parent == $child)
        {
            return "selected";
        }
        else
        {
            return '';
        }
        
    }
}






//  show options according view page ( edit , delete , status)

if (!function_exists('show_potions')) 
{
    function show_potions($route,$id,$status=null) 
    {
        $data['routeName'] = $route;
        $data['row_id'] = $id;
        $data['row_status'] = $status;
        return view('admin.inc.global._options')->with($data);
    }
}
                                                


// display image from uploads folder
if (!function_exists('getImage')) 
{
    function getImage($path) 
    {
        return url('uploads/'.$path.'/');
    }
}



// display seo data
if (!function_exists('seoData')) 
{
    function seoData($seo,$field) 
    {
        if($seo)
        {
            if(isset($seo->$field))
            {
                return $seo->$field;
            }
            else
            {
                return '';
            }
        }
    }
}




// display json data in blade 
if (!function_exists('json_data')) 
{
    function json_data($json_data,$field) 
    {
        if($json_data)
        {
            if(isset($json_data->$field))
            {
                return $json_data->$field;
            }
            else
            {
                return '';
            }
        }
    }
}




//  get setting 
if (!function_exists('setting')) 
{
    function setting() 
    {
        $setting =  DB::table('settings')->where('language_id',lang_front())->first();
        
        if($setting)
        {
            return $setting;
        }
        else
        {
            return DB::table('settings')->first();
        }
    }
}



// slug ( url ) 

if (!function_exists('slug')) 
{
    function slug($slug)
    {
        if($slug)
        {
            $except = array('\\', '/', ':', '*', '?', '"', '<', '>', '|', ' ', '+', '&', '#', ';');
            return str_replace($except, '-', $slug);
        }
    }
}






// pathes    
// define link for uploads folders

define("UPLOADS_PATH", 'uploads/');
define("CATEGORY_PATH", 'category/');
define("SUBCATEGORY_PATH", 'subCategory/');
define("LANGUAGE_PATH", 'language/');
define("COUNTRY_PATH", 'country/');
define("STATIC_PAGE_PATH", 'staticPage/');
define("SETTINGS_PATH", 'settings/');
define("SERVICE_PATH", 'service/');
define("SERVICE_IMAGES_PATH", 'service/images');
define("SLIDER_PATH", 'slider/');
define("BLOG_PATH", 'blog/');
define("BRANCH_PATH", 'branch/');
define("BRAND_PATH", 'brand/');
define("PRODUCT_PATH", 'product/');


