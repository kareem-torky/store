<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Color;

class Product extends Model
{
    




    public function category()
    {
        return $this->hasOne('App\Models\Category','id','category_id');
   
    }

    public function sub()
    {
    	return $this->hasOne('App\Models\SubCategory','id','sub_category_id');
    }


    // print color of product 
    public function getColor($id)
    {
    	return Color::where('id',$id)->first();
    }
}
