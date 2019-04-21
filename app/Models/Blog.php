<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Blog extends Model
{
    protected $fillable = ['name','language_id','img','description','slug','small_description','category_id'];
  


    public function category()
    {
    	return $this->hasOne('App\Models\Category','id','category_id');
    }
}
