@extends('layouts.home')
@section('info')
    <title>{{$field->name}} - {{Config::get('web_blog_conf.web_title')}}</title>
    <meta name="keywords" content="{{$field->keywords}}" />
    <meta name="description" content="{{$field->description}}" />
@endsection
@section('content')
    <article>
        <h1 class="t_nav"><span>{{$field->title}}</span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('cate/'.$field->cate_id)}}" class="n2">{{$field->cate_name}}</a></h1>
        <div class="newblog left">
            @foreach($data as $d)
            <h2>{{$d->title}}</h2>
            <p class="dateview"><span>发布时间：{{$d->addtime}}</span><span>作者：{{$d->author}}</span><span>分类：[<a href="{{url('blog/cate/'.$field->id)}}">{{$field->name}}</a>]</span></p>
            <figure><img src="{{url('uploads/'.$d->thumb)}}"></figure>
            <ul class="nlist">
                <p>{{$d->description}}</p>
                <a title="{{$d->title}}" href="{{url('blog/art/'.$d->id)}}" target="_blank" class="readmore">阅读全文>></a>
            </ul>
            <div class="line"></div>
            @endforeach

            <div class="page">
                {{$data->links()}}
            </div>
        </div>
        <aside class="right">
            @if($submenu->all())
            <div class="rnav">
                <ul>
                    @foreach($submenu as $k=>$s)
                    <li class="rnav{{$k+1}}"><a href="{{url('blog/cate/'.$s->cate_id)}}" target="_blank">{{$s->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
            </script>
            <!-- Baidu Button END -->

            <div class="news" style="float:left;">
                @parent
            </div>
        </aside>
    </article>
@endsection


