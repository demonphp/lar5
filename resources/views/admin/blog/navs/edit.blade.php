
<div class="pageContent">
	<form method="post" action="/admin/blog/navs/save" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<p>
				<label>导航id：</label>
				<input name="id" type="text" size="30" value="{{$data['id']}}" readonly="readonly"/>
			</p>
			<p>
				<label>名称：</label>
				<input name="name" class="required" type="text" size="30" value="{{$data['name']}}" alt="请输入导航名称"/>
			</p>
			<p>
				<label>别名：</label>
				<input name="alias" class="required" type="text" size="30" value="{{$data['alias']}}" alt="请输入导航别名"/>
			</p>
			<p>
				<label>链接：</label>
				<input name="url" class="required" type="text" size="30" value="{{$data['url']}}" alt="请输入导航链接"/>
			</p>
			<p>
				<label>排序：</label>
				<input name="order" class="required" type="text" size="30" value="{{$data['order'] or 0}}" alt="排序"/>
			</p>
			<p>
				<label>创建 时间：</label>
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
