
<div class="pageContent">
	<form method="post" action="/admin/manager/role/save"  class="pageForm required-validate" onsubmit="return iframeCallback(this);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<p>
				<label>id：</label>
				<input name="id" type="text" size="30" value="{{$data['id']}}" readonly="readonly"/>
			</p>
			<p>
				<label>角色英文名：</label>
				<input name="name" class="required" type="text" size="30" value="{{$data['name']}}" alt="请输入角色英文名"/>
			</p>
			<p>
				<label>角色中文名：</label>
				<input name="display_name" class="required" type="text" size="30" value="{{$data['display_name']}}" alt="请输入角色中文名"/>
			</p>
			<p>
				<label>简要描述：</label>
				<textarea name="description" class="required" cols="35" rows="10">{{$data['description']}}</textarea>
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
