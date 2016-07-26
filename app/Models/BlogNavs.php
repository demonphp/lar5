<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogNavs extends Model
{
    protected $table='blog_navs';

    protected $fillable = ['name','alias','url','order'];
}