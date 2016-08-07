<?php

namespace App\Http\Controllers\Home;

use App\Models\BlogArt;
use App\Models\BlogNavs;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;;
use View;

class BlogCommonController extends Controller
{
    public function __construct()
    {
        //点击量最高的6篇文章
        $hot = BlogArt::orderBy('view','desc')->take(5)->get();

        //最新发布文章8篇
        $new = BlogArt::orderBy('addtime','desc')->take(8)->get();

        $navs = BlogNavs::all();

        View::share('navs',$navs);
        View::share('hot',$hot);
        View::share('new',$new);

    }
}
