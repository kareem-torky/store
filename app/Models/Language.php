<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = ['name','symbole','icon'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
