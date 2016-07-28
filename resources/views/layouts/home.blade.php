<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('info')
    <link href="{{asset('asset/Blog/Home/index/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('asset/Blog/Home/index/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('asset/Blog/Home/index/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('asset/Blog/Home/index/css/new.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('/views/home/js/modernizr.js')}}"></script>
    <![endif]-->
</head>
<body>
<header>
    <div id="logo"><a href="{{url('/blog')}}"></a></div>
    <nav class="topnav" id="topnav">
        @foreach($navs as $k=>$v)<a href="{{$v->url}}"><span>{{$v->name}}</span><span class="en">{{$v->alias}}</span></a>@endforeach
    </nav>
</header>

@section('content')
    <h3>
        <p>最新<span>文章</span></p>
    </h3>
    <ul class="rank">
        @foreach($new as $n)
            <li><a href="{{url('blog/art/'.$n->id)}}" title="{{$n->title}}" target="_blank">{{$n->title}}</a></li>
        @endforeach
    </ul>
    <h3 class="ph">
        <p>点击<span>排行</span></p>
    </h3>
    <ul class="paih">
        @foreach($hot as $h)
            <li><a href="{{url('blog/art/'.$h->id)}}" title="{{$h->title}}" target="_blank">{{$h->title}}</a></li>
        @endforeach
    </ul>
@show

<footer>
    <p>{!! Config::get('web.copyright') !!} {!! Config::get('web.web_count') !!}</p>
</footer>
</body>
</html>
