<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $fillable = ['name','language_id','img','description','slug','show_in_homePage','small_description'];

    public function services()
    {
    	return $this->hasMany('App\Models\Service','category_id','id');
    }



    public function product()
    {
        return $this->hasMany('App\Models\Product','category_id','id');
    }



    public function sub()
    {
        return $this->hasMany('App\Models\SubCategory','category_id','id')
        ->select('id','slug','name')->take(3)->latest()
        ->where('status','yes')->where('show_in_homePage','yes')->get();
    }



    public function fProduct()
    {
        return $this->hasMany('App\Models\Product','category_id','id')
        ->select('id','name','price','img','offer','category_id','slug','sub_category_id')
        ->where('status','yes')->where('show_in_homePage','yes')
        ->where('featured','yes')->where('language_id',lang_front())
        ->take(6)->latest()->get();
    }

}
