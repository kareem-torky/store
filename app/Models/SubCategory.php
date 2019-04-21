<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name','category_id','language_id','img','description','slug','show_in_homePage'];



    public function category()
    {
    	return $this->hasOne('App\Models\Category','id','category_id');
    }


    public function productMenu()
    {
        return $this->hasMany('App\Models\Product','sub_category_id','id')
        ->select('id','slug','name')->take(5)->latest()
        ->where('status','yes')->where('show_in_homePage','yes')->get();
    }


    public function images()
    {
    	return $this->hasMany('App\Models\SubCategoryImage','sub_category_id','id');
    }







   
}
