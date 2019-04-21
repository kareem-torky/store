<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OrderContent extends Model
{
    
    protected $fillable = ['order_id', 'product_id', 'quantity', 'status', 'refused_notes'];
    
	public function order()
    {
        return $this->hasOne('App\Models\Product\Order','id','order_id');
    }

	public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
