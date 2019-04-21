<?php 




// define link for assets of front ( styles and scripts )
if (!function_exists('furl')) 
{
    function furl()
    {
         return url('front');
    }
}

if (!function_exists('clientAuth')) 
{
    function clientAuth()
    {
        return auth()->guard('client');
    }
}


// language symbole 
if (!function_exists('language_symbole')) 
{
    function language_symbole()
    {
        $lang = DB::table('languages')->where('id',language())->first();
        return  $lang->symbole;
    }
}





// language symbole  in front
if (!function_exists('lang_front')) 
{
    function lang_front()
    {
        $lang = DB::table('languages')->where('symbole',Request::segment(1))->first();
        if($lang)
        {
            return $lang->id;
        }
        $lang = DB::table('languages')->first();
        return $lang->id;
        
    }
}




// get static pages 
if (!function_exists('staticPages')) 
{
    function staticPages()
    {
        $staticPages = DB::table('static_pages')
        ->where('language_id',lang_front())
        ->where('type','static')
        ->where('deleted_at',null)
        ->get();
        return $staticPages;
    }
}


// get site content home 
if (!function_exists('site_content')) 
{
    function site_content()
    {
        $site_content = DB::table('site_contents')->where('language_id',lang_front())->first();
        if(!$site_content)
        {
            $site_content = DB::table('site_contents')->first();
        }
        return json_decode($site_content->site_content);
    }
}











// get languages
if (!function_exists('languages')) 
{
    function languages()
    {
        $languages = DB::table('languages')->get();
        return $languages;
    }
}


// number of words 
if (!function_exists('num_words')) 
{
    function num_words($word,$num = 2,$end='')
    {
        return \Str::Words($word,$num,$end); 
    }
}




// return data of seo for specific item 
if (!function_exists('seo')) 
{
    function seo($seo,$key)
    {
        if($seo)
        {
            $data = json_decode($seo);
            if($data->$key)
            {
                return $data->$key;
            }
        }
    }
}


// get seo content home 
if (!function_exists('seo_content')) 
{
    function seo_content()
    {
        $seo_content = DB::table('settings')->where('language_id',lang_front())->first();
        if(!$seo_content)
        {
            $seo_content = DB::table('settings')->first();
        }
        return json_decode($seo_content->seo);
    }
}



