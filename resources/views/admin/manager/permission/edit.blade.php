
<div class="pageContent">
	<form method="post" action="/admin/manager/permission/save" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<p>
				<label>id：</label>
				<input name="id" type="text" size="30" value="{{$data['id']}}" readonly="readonly"/>
			</p>
			<p>
				<label>权限英文名：</label>
				<input name="name" class="required" type="text" size="30" value="{{$data['name']}}" alt="请输入权限英文名"/>
			</p>
			<p>
				<label>权限中文名：</label>
				<input name="display_name" class="required" type="text" size="30" value="{{$data['display_name']}}" alt="请输入权限中文名"/>
			</p>
			<p>
				<label>描述：</label>
				<input name="description" class="required" type="text" size="30" value="{{$data['description']}}" alt="描述"/>
			</p>
			<p>
				<label>排序：</label>
				<input name="sort" class="required" type="text" size="30" value="{{$data['sort']}}" alt="排序"/>
			</p>
			<p>
				<label>上级分类：</label>
				<select  name="parent_id">
					<option value="">请选择上级分类</option>
					@foreach($tree as $k => $v)
						<option value="{{ $k }}"
								@if($k == $data['parent_id']) selected @endif
								@if(in_array($k,$disabledIdsArr))) disabled @endif
						>{{ $v }}</option>
					@endforeach
				</select>
			</p>
			<p>
				<label>是否菜单：</label>
				<input type="radio" name="is_menu" @if(isset($data['is_menu']) && $data['is_menu'] == 1) checked="checked" @elseif(!isset($data['is_menu'])) checked="checked" @endif  />是
				<input type="radio" name="is_menu" @if(isset($data['is_menu']) && $data['is_menu'] == 0) checked="checked" @endif  />否
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
