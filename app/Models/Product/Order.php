<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'name', 'email', 'mobile','address'
    ];


    public function content()
    {
        return $this->hasMany('App\Models\Product\OrderContent','order_id','id');
    }

    public function admin()
    {
        return $this->hasOne('App\Models\Admin','id','admin_id');
    }
}
