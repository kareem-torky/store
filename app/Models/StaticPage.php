<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $fillable = ['name','language_id','img','description','slug'];

}
