<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['language_id', 'title', 'color'];
}
