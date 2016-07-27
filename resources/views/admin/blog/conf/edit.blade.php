
<div class="pageContent">
	<form method="post" action="/admin/blog/conf/save"  class="pageForm required-validate" onsubmit="return iframeCallback(this);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<p>
				<label>网站标题：</label>
				<input name="web_title" class="required" type="text" size="30" value="{{$data['web_title']}}" alt="请输入网站标题"/>
			</p>
			<p>
				<label>网站统计：</label>
				<input name="web_count" class="required" type="text" size="30" value="{{$data['web_count']}}" alt="请输入网站统计"/>
			</p>
			<p>
				<label>网站状态：</label>
				<input name="web_status" class="required" type="text" size="30" value="{{$data['web_status']}}" alt="请输入网站状态"/>
			</p>
			<p>
				<label>SEO标题：</label>
				<input name="seo_title" class="required" type="text" size="30" value="{{$data['seo_title']}}" alt="请输入SEO标题"/>
			</p>
			<p>
				<label>关键词：</label>
				<input name="keywords" class="required" type="text" size="30" value="{{$data['keywords']}}" alt="关键词"/>
			</p>
			<p>
				<label>描述：</label>
				<input name="description" class="required" type="text" size="30" value="{{$data['description']}}" alt="描述"/>
			</p>
			<p>
				<label>版权：</label>
				<input name="copyright" class="required" type="text" size="30" value="{{$data['copyright']}}" alt="版权"/>
			</p>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>
