<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\Service;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Setting;
use App\Models\SiteContent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // settings
        $setting = Setting::where('language_id',lang_front())->first();
        $site = SiteContent::where('language_id',lang_front())->first();
        $site_content =  json_decode($site->site_content);

        // // brands
        $brands = Brand::select('img','name')
        ->where('language_id',lang_front())->where('status','yes')
        ->take(8)->get();


        $categories = Category::select('id','name','slug','img')
        ->where('status','yes')->where('show_in_homePage','yes')
        ->where('language_id',lang_front())
        ->latest()->get();


         \View::share(['setting'=>$setting,
         'brands'=>$brands,
         'site_content'=>$site_content,
         'categories'=>$categories]);
    
    
    
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
