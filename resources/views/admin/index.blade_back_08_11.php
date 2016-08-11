<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>demon后台管理系统</title>


	<link href="{{ asset('asset/Dwz/themes/default/style.css')}}" rel="stylesheet" type="text/css" media="screen"/>
	<link href="{{ asset('asset/Dwz/themes/css/core.css')}}" rel="stylesheet" type="text/css" media="screen"/>
	<link href="{{ asset('asset/Dwz/themes/css/print.css')}}" rel="stylesheet" type="text/css" media="print"/>
	<link href="{{ asset('asset/Dwz/uploadify/css/uploadify.css')}}" rel="stylesheet" type="text/css" media="screen"/>
	<!--[if IE]>
	<link href="themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
	<![endif]-->

	<!--[if lt IE 9]><script src="js/speedup.js" type="text/javascript"></script><script src="js/jquery-1.11.3.min.js" type="text/javascript"></script><![endif]-->
	<!--[if gte IE 9]><!--><script src="{{ asset('asset/Dwz/js/jquery-2.1.4.min.js')}}" type="text/javascript"></script><!--<![endif]-->

	<script src="{{ asset('asset/Dwz/js/jquery.cookie.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/jquery.validate.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/jquery.bgiframe.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/xheditor/xheditor-1.2.2.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/xheditor/xheditor_lang/zh-cn.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/uploadify/scripts/jquery.uploadify.js')}}" type="text/javascript"></script>

	<!-- svg图表  supports Firefox 3.0+, Safari 3.0+, Chrome 5.0+, Opera 9.5+ and Internet Explorer 6.0+ -->
	<script type="text/javascript" src="{{ asset('asset/Dwz/chart/raphael.js')}}"></script>
	<script type="text/javascript" src="{{ asset('asset/Dwz/chart/g.raphael.js')}}"></script>
	<script type="text/javascript" src="{{ asset('asset/Dwz/chart/g.bar.js')}}"></script>
	<script type="text/javascript" src="{{ asset('asset/Dwz/chart/g.line.js')}}"></script>
	<script type="text/javascript" src="{{ asset('asset/Dwz/chart/g.pie.js')}}"></script>
	<script type="text/javascript" src="{{ asset('asset/Dwz/chart/g.dot.js')}}"></script>

	<script src="{{ asset('asset/Dwz/js/dwz.core.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.util.date.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.validate.method.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.barDrag.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.drag.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.tree.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.accordion.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.ui.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.theme.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.switchEnv.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.alertMsg.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.contextmenu.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.navTab.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.tab.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.resize.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.dialog.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.dialogDrag.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.sortDrag.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.cssTable.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.stable.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.taskBar.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.ajax.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.pagination.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.database.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.datepicker.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.effects.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.panel.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.checkbox.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.history.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.combox.js')}}" type="text/javascript"></script>
	<script src="{{ asset('asset/Dwz/js/dwz.print.js')}}" type="text/javascript"></script>

	<!-- 可以用dwz.min.js替换前面全部dwz.*.js (注意：替换时下面dwz.regional.zh.js还需要引入)
    <script src="bin/dwz.min.js" type="text/javascript"></script>
    -->
	<script src="{{ asset('asset/Dwz/js/dwz.regional.zh.js')}}" type="text/javascript"></script>

	<script type="text/javascript">
		$(function(){
			DWZ.init("{{ asset('asset/Dwz/dwz.frag.xml')}}", {
				loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
//		loginUrl:"login.html",	// 跳到登录页面
				statusCode:{ok:200, error:300, timeout:301}, //【可选】
				pageInfo:{pageNum:"page", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
				keys: {statusCode:"statusCode", message:"message"}, //【可选】
				ui:{hideMode:'offsets'}, //【可选】hideMode:navTab组件切换的隐藏方式，支持的值有’display’，’offsets’负数偏移位置的值，默认值为’display’
				debug:true,	// 调试模式 【true|false】
				callback:function(){
					initEnv();
					$("#themeList").theme({themeBase:"themes"}); // themeBase 相对于index页面的主题base路径
				}
			});
		});
	</script>
</head>

<body>
<div id="layout">
	<div id="header">
		<div class="headerNav">
			<a class="logo">标志</a>
			<ul class="nav">
				<li id="switchEnvBox"><a href="javascript:">（<span>北京</span>）切换城市</a>
					<ul>
						<li><a href="sidebar_1.html">北京</a></li>
						<li><a href="sidebar_2.html">上海</a></li>
						<li><a href="sidebar_2.html">南京</a></li>
						<li><a href="sidebar_2.html">深圳</a></li>
						<li><a href="sidebar_2.html">广州</a></li>
						<li><a href="sidebar_2.html">天津</a></li>
						<li><a href="sidebar_2.html">杭州</a></li>
					</ul>
				</li>
				<li><a href="https://me.alipay.com/dwzteam" target="_blank">捐赠</a></li>
				<li><a href="changepwd.html" target="dialog" width="600">设置</a></li>
				<li><a href="http://www.cnblogs.com/dwzjs" target="_blank">博客</a></li>
				<li><a href="http://weibo.com/dwzui" target="_blank">微博</a></li>
				<li><a href="/admin/logout">退出</a></li>
			</ul>
			<ul class="themeList" id="themeList">
				<li theme="default"><div class="selected">蓝色</div></li>
				<li theme="green"><div>绿色</div></li>
				<li theme="red"><div>红色</div></li>
				<li theme="purple"><div>紫色</div></li>
				<li theme="silver"><div>银色</div></li>
				<li theme="azure"><div>天蓝</div></li>
			</ul>
		</div>

		<!-- navMenu -->

	</div>

	<div id="leftside">
		<div id="sidebar_s">
			<div class="collapse">
				<div class="toggleCollapse"><div></div></div>
			</div>
		</div>
		<div id="sidebar">
			<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

			<div class="accordion" fillSpace="sidebar">
				<div class="accordionHeader">
					<h2><span>Folder</span>我的博客</h2>
				</div>
				<div class="accordionContent">
					<ul class="tree">
						{{--<li><a href="tabsPage.html" target="navTab">栏目设置</a>--}}
							{{--<ul>--}}
								<li><a href="{{ url('/blog')}}"  target="_blank" rel="main">博客主页</a></li>
								<li><a href="{{ url('/admin/blog/cate/list') }}" target="navTab" rel="w_table">文章分类</a></li>
								<li><a href="{{ url('/admin/blog/art/list') }}" target="navTab" rel="w_table">文章列表</a></li>
								<li><a href="{{ url('/admin/blog/links/list') }}" target="navTab" rel="w_table">友情链接</a></li>
								<li><a href="{{ url('/admin/blog/navs/list') }}" target="navTab" rel="w_table">自定义导航</a></li>
								<li><a href="{{ url('/admin/blog/conf/edit') }}" target="navTab" rel="w_table">网站配置</a></li>
								<li><a href="{{ url('/admin/user/list') }}" target="navTab" rel="w_table">用户列表</a></li>
								<li><a href="{{ url('/admin/manager/admin/list') }}" target="navTab" rel="w_table">管理列表</a></li>
								<li><a href="{{ url('/admin/manager/role/list') }}" target="navTab" rel="w_table">角色列表</a></li>
								<li><a href="{{ url('/admin/manager/permission/list') }}" target="navTab" rel="w_table">权限列表</a></li>
							</ul>
						{{--</li>--}}
					</ul>
				</div>

				<div class="accordionHeader">
					<h2><span>Folder</span>典型页面</h2>
				</div>
				<div class="accordionContent">
					<ul class="tree treeFolder treeCheck">
						<li><a href="demo_page1.html" target="navTab" rel="demo_page1">查询我的客户</a></li>
						<li><a href="demo_page1.html" target="navTab" rel="demo_page2">表单查询页面</a></li>
						<li><a href="demo_page4.html" target="navTab" rel="demo_page4">表单录入页面</a></li>
						<li><a href="demo_page5.html" target="navTab" rel="demo_page5">有文本输入的表单</a></li>
						<li><a href="javascript:;">有提示的表单输入页面</a>
							<ul>
								<li><a href="javascript:;">页面一</a></li>
								<li><a href="javascript:;">页面二</a></li>
							</ul>
						</li>
						<li><a href="javascript:;">选项卡和图形的页面</a>
							<ul>
								<li><a href="javascript:;">页面一</a></li>
								<li><a href="javascript:;">页面二</a></li>
							</ul>
						</li>
						<li><a href="javascript:;">选项卡和图形切换的页面</a></li>
						<li><a href="javascript:;">左右两个互动的页面</a></li>
						<li><a href="javascript:;">列表输入的页面</a></li>
						<li><a href="javascript:;">双层栏目列表的页面</a></li>
					</ul>
				</div>
				<div class="accordionHeader">
					<h2><span>Folder</span>流程演示</h2>
				</div>
				<div class="accordionContent">
					<ul class="tree">
						<li><a href="newPage1.html" target="dialog" rel="dlg_page">列表</a></li>
						<li><a href="newPage1.html" target="dialog" rel="dlg_page2">列表</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="container">
		<div id="navTab" class="tabsPage">
			<div class="tabsPageHeader">
				<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
					<ul class="navTab-tab">
						<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
					</ul>
				</div>
				<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
				<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
				<div class="tabsMore">more</div>
			</div>
			<ul class="tabsMoreList">
				<li><a href="javascript:;">我的主页</a></li>
			</ul>
			<div class="navTab-panel tabsPageContent layoutBox">
				<div class="page unitBox">
					<div class="accountInfo">

					</div>
					<div class="pageFormContent" layoutH="80" style="margin-right:230px">




					</div>

					<div style="width:230px;position: absolute;top:60px;right:0" layoutH="80">
						<iframe width="100%" height="430" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?width=0&height=430&fansRow=2&ptype=1&skin=1&isTitle=0&noborder=1&isWeibo=1&isFans=0&uid=1739071261&verifier=c683dfe7"></iframe>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>

<div id="footer">Copyright &copy; 2016 <a href="demo_page2.html" target="dialog">demon后台系统</a> 京ICP备15053290号-2</div>

</body>
</html>