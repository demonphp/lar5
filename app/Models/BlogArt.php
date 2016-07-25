<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogArt extends Model
{
    protected $table='blog_art';

    protected $fillable = ['name','title','keywords','description','content','thumb','view','order','cate_id','author','addtime'];
}