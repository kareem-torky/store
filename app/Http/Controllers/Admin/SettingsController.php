<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SiteContent;


use Image;
use Storage;
use App\Helpers\Classes\UploadClass;

class SettingsController extends Controller
{
  

    // return view of adding data 
    public function base()
    {
        $data['base'] = Setting::where('language_id',language())->first();
        if(!$data['base'])
        {
            // create instance for this setting language first time 
            $base = new Setting();
            $base->language_id = language();
            $base->save();

            $data['base'] = $base; 
        }
        return view('admin.setting.base')->with($data);

    }





    // storing data in db 
    public function updateBase(SettingsRequest $request)
    {
    	$data = $request->validated();
        // upload image of this module
        if($request->hasFile('logo'))
        {
            $old = Setting::findOrFail($request->id);
            // delete old image from server
            if($old->logo)
            {
                Storage::disk('public_uploads')->delete(SETTINGS_PATH.$old->logo);
            }
            // UPLOADS_PATH.CATEGORY_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadRealImage($request,'logo',UPLOADS_PATH.SETTINGS_PATH);
            $data['logo'] = $img;
        }

        $data['pinterest'] = $request->pinterest;
        $data['address'] =  nl2br($request->address);
    	// updating data in db
    	Setting::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return back();
    }




     // return view of seo data 
    public function seo()
    {
        $data['seo'] = Setting::where('language_id',language())->first();
        if(!$data['seo'])
        {
            // create instance for this setting language first time 
            $seo = new Setting();
            $seo->language_id = language();
            $seo->save();
            $data['seo'] = $seo; 
        }
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.setting.seo')->with($data);

    }



     // storing data in db 
    public function updateSeo(SettingsRequest $request)
    {


        $data = $request->except('id','_token','setting_type');
        // updating data in db
        $seoData = Setting::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message',trans('site.updated_success'));
        return back();
    }













   //  site content view 
    
   public function siteContent()
   {
       $site_content = SiteContent::where('language_id',language())->first();
       if(!$site_content)
       {
           // create instance for this setting language first time 
           $dataSite = new SiteContent();
           $dataSite->language_id = language();
           $dataSite->save();
           $data['site_content'] = $dataSite; 
       }
       $data['site_content'] = json_decode($site_content->site_content);
       return view('admin.setting.siteContent')->with($data);
   }


   //  site content home 
   
   public function homeSiteContent(Request $request)
   {
       $data = $request->except('_token');
         // updating data in db
       $siteContent = SiteContent::where('language_id',language())->first();
       $siteContent->site_content = json_encode($data);

       if($request->hasFile('section1_img') AND $request->section1_img !='')
        {
            $image = UploadClass::uploadImage($request,'section1_img',UPLOADS_PATH.SETTINGS_PATH);
            $data['section1_img'] = $image;
        }else{$data['section1_img'] = $siteContent->section1_img ? $siteContent->section1_img : '';}
        
       $data['section1_desc']               = nl2br($request->section1_desc);
       $data['section3_descIcon1']          = nl2br($request->section3_descIcon1);
       $data['section3_descIcon2']          = nl2br($request->section3_descIcon2);
       $data['section3_descIcon3']          = nl2br($request->section3_descIcon3);
       $data['section3_descIcon4']          = nl2br($request->section3_descIcon4);
       $data['blog_desc']                   = nl2br($request->blog_desc);
       $data['footer_desc']                 = nl2br($request->footer_desc);
       $data['contactUs_workHContent']      = nl2br($request->contactUs_workHContent);
      
       $siteContent->save();
       session()->flash('message',trans('site.updated_success'));
       return back();
   }















    // return view of about us page  
    public function aboutus()
    {
        $data['about'] = Setting::where('language_id',language())->first();
        if(!$data['about'])
        {
            // create instance for this setting language first time 
            $aboutus = new Setting();
            $aboutus->language_id = language();
            $aboutus->save();
            $data['about'] = $aboutus; 
        }
        $data['aboutus'] = json_decode($data['about']['who_us']);
        return view('admin.setting.aboutus')->with($data);

    }



     // storing data in db 
    public function updateaboutus(Request $request)
    {

        $data = [];

        //  slug
        if($request->aboutUsSlug != ''){$data['aboutUsSlug'] = slug($request->aboutUsSlug);}
        else{$data['aboutUsSlug'] = slug($request->aboutUsTitle).uniqid();}
         // upload image of this module
        if($request->hasFile('img1'))
        {
            $img = UploadClass::uploadImage($request,'img1',UPLOADS_PATH.SETTINGS_PATH);
            $data['img1'] = $img;
        }

        $data['aboutUsTitle'] = $request->aboutUsTitle;
        $data['aboutUsSmallDescription'] = $request->aboutUsSmallDescription;
        $data['aboutUsDescription'] = $request->aboutUsDescription;


        // updating data in db
        $seoData = Setting::find($request->id);
        $seoData->who_us = json_encode($data);
        $seoData->save();
        session()->flash('message',trans('site.updated_success'));
        return back();
    }































}
