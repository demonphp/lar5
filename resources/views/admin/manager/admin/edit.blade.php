
<div class="pageContent">
	<form method="post" action="/admin/blog/art/save" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<p>
				<label>用户名：</label>
				<input name="name" type="text" size="30" value="{{$data['name']}}" readonly="readonly"/>
			</p>
			<p>
				<label>邮箱：</label>
				<input name="email" class="required" type="text" size="30" value="{{$data['email']}}" alt="邮箱"/>
			</p>
			<p>
				<label>新密码：</label>
				<input name="password" class="required" type="password" size="30" value="" alt="请输入新密码"/>
			</p>
			<p>
				<label>确定密码：</label>
				<input name="again_password" class="required" type="password" size="30" value="" alt="请再一次输入密码"/>
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
