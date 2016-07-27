<?php

namespace App\Http\Controllers\Home;

use App\Models\BlogArt;
use App\Models\BlogCate;
use App\Models\BlogLinks;

class BlogIndexController extends BlogCommonController
{
    protected $view_path = 'home.blog';

    public function index()
    {
        //点击量最高的6篇文章（站长推荐）
        $pics = BlogArt::orderBy('art_view','desc')->take(6)->get();

        //图文列表5篇（带分页）
        $data = BlogArt::orderBy('art_time','desc')->paginate(5);

        //友情链接
        $links = BlogLinks::orderBy('link_order','asc')->get();

        return view($this->view_path .'.index',compact('pics','data','links'));
    }

    public function cate($cate_id)
    {
        //图文列表4篇（带分页）
        $data = BlogArt::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);

        //查看次数自增
        BlogCate::where('cate_id',$cate_id)->increment('cate_view');

        //当前分类的子分类
        $submenu = BlogCate::where('cate_pid',$cate_id)->get();

        $field = BlogCate::find($cate_id);
        return view($this->view_path .'.home.list',compact('field','data','submenu'));
    }

    public function article($art_id)
    {
        $field = BlogArt::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();

        //查看次数自增
        BlogArt::where('art_id',$art_id)->increment('art_view');

        $article['pre'] = BlogArt::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next'] = BlogArt::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();

        $data = BlogArt::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

        return view($this->view_path .'.new',compact('field','article','data'));
    }
}
