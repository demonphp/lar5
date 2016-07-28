<?php

namespace App\Http\Controllers\Home;

use App\Models\BlogArt;
use App\Models\BlogCate;
use App\Models\BlogLinks;

class BlogIndexController extends BlogCommonController
{
    protected $view_path = 'home.blog';

    public function getIndex()
    {
        //点击量最高的6篇文章（站长推荐）
        $pics = BlogArt::orderBy('view','desc')->take(6)->get();

        //图文列表5篇（带分页）
        $data = BlogArt::orderBy('created_at','desc')->paginate(5);

        //友情链接
        $links = BlogLinks::orderBy('order','asc')->get();
        return view($this->view_path .'.index',compact('pics','data','links'));
    }

    public function anyCate($cate_id)
    {
        //图文列表4篇（带分页）
        $data = BlogArt::where('id',$cate_id)->orderBy('addtime','desc')->paginate(4);

        //查看次数自增
        BlogCate::where('id',$cate_id)->increment('view');

        //当前分类的子分类
        $submenu = BlogCate::where('pid',$cate_id)->get();

        $field = BlogCate::find($cate_id);
        return view($this->view_path .'.list',compact('field','data','submenu'));
    }

    public function anyArt($art_id)
    {
        $art = new BlogArt();
        $field = $art->getArtDetailFirst($art_id);

        //查看次数自增
        BlogArt::where('id',$art_id)->increment('view');

        $article['pre'] = BlogArt::where('id','<',$art_id)->orderBy('id','desc')->first();
        $article['next'] = BlogArt::where('id','>',$art_id)->orderBy('id','asc')->first();

        $data = BlogArt::where('id',$field['cate_id'])->orderBy('id','desc')->take(6)->get();

        return view($this->view_path .'.new',compact('field','article','data'));
    }


}
