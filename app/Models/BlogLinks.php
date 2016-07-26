<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogLinks extends Model
{
    protected $table='blog_links';

    protected $fillable = ['name','title','url'];
}