
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
				<input type="radio" name="web_status" value="1" checked="checked">开启 <input type="radio" name="web_status" value="0">关闭
			</p>
			<p>
				<label>SEO标题：</label>
				<input name="seo_title" class="required" type="text" size="30" value="{{$data['seo_title']}}" alt="请输入SEO标题"/>
			</p>
			<p>
				<label>版权：</label>
				<textarea name="copyright" class="required" cols="40" rows="10">{{$data['copyright']}}</textarea>
			</p>
			<p>
				<label>描述：</label>
				<textarea name="description" class="required" cols="40" rows="10">{{$data['description']}}</textarea>
			</p>
			<p>
				<label>关键词：</label>
				<input name="keywords" class="required" type="text" size="30" value="{{$data['keywords']}}" alt="关键词"/>
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
