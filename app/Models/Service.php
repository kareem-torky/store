<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name','category_id','language_id','img','small_description','description','slug','show_in_homePage'];
    public function category()
    {
    	return $this->hasOne('App\Models\Category','id','category_id');
    }


    public function images()
    {
    	return $this->hasMany('App\Models\ServiceImage','service_id','id');
    }
}
