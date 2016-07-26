
<div class="pageContent">
	<form method="post" action="/admin/blog/links/save" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<p>
				<label>链接id：</label>
				<input name="id" type="text" size="30" value="{{$data['id']}}" readonly="readonly"/>
			</p>
			<p>
				<label>链接名称：</label>
				<input name="name" class="required" type="text" size="30" value="{{$data['name']}}" alt="请输入链接名称"/>
			</p>
			<p>
				<label>链接标题：</label>
				<input name="title" class="required" type="text" size="30" value="{{$data['title']}}" alt="请输入链接标题"/>
			</p>
			<p>
				<label>链接地址：</label>
				<input name="url" class="required" type="text" size="30" value="{{$data['url']}}" alt="请输入链接地址"/>
			</p>
			<p>
				<label>排序：</label>
				<input name="order" class="required" type="text" size="30" value="{{$data['order'] or 0}}" alt="排序"/>
			</p>
			<p>
				<label>创建时间：</label>
				<input readonly="readonly" type="text" size="30" value="{{$data['created_at']}}" />
			</p>
			<p>
				<label>修改时间：</label>
				<input readonly="readonly" type="text" size="30" value="{{$data['updated_at']}}" />
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
