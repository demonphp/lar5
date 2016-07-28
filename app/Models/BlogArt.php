<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogArt extends Model
{
    protected $table='blog_art';
    protected $tb_blog_cate = 'blog_cate';

    protected $fillable = ['name','title','keywords','description','content','thumb','view','order','cate_id','author','addtime'];

    /*
     * @desc 获取某一文章的详细信息
     */
    public function getArtDetailFirst($art_id) {

        $field = BlogArt::leftJoin($this->tb_blog_cate,$this->table .'.cate_id','=',$this->tb_blog_cate.'.id')
            ->where('blog_art.id',$art_id)
            ->select($this->table .'.*',$this->tb_blog_cate.'.name as cate_name')
            ->first();

        return $field;
    }

}