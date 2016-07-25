<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCate extends Model
{
    protected $table='blog_cate';

    protected $fillable = ['name','title','keywords','description','view','order','pid'];
}