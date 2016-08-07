
<div class="pageContent">
	<form method="post" action="/admin/manager/admin/accr-save" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<input type="hidden" value="{{$data['id']}}" name="user_id">
			<p>
				<label>管理员名称：</label>
				<input name="name" type="text" size="30" value="{{$data['name']}}" readonly="readonly" disabled="disabled"/>
			</p>
			<p>
				<label>所属角色：</label>
				@if(!empty($role))
					@foreach($role as $v)
						<input type="checkbox" name="role_id[]" @if(in_array($v['id'],$this_roles)) checked="checked" @endif value="{{$v['id']}}" />{{$v['display_name']}}
					@endforeach
				@endif
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
