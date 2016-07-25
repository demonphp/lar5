<div class="pageContent">
	<form method="post" action="/admin/blog/cate/save" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<p>
				<label>分类id：</label>
				<input name="id" type="text" size="30" value="{{$data['id']}}" readonly="readonly"/>
			</p>
			<p>
				<label>分类名称：</label>
				<input name="name" class="required" type="text" size="30" value="{{$data['name']}}" alt="请输入分类名称"/>
			</p>
			<p>
				<label>分类标题：</label>
				<input name="title" class="required" type="text" size="30" value="{{$data['title']}}" alt="分类标题"/>
			</p>
			<p>
				<label>关键字：</label>
				<input name="keywords" class="required" type="text" size="30" value="{{$data['keywords']}}" alt="关键字"/>
			</p>
			<p>
				<label>描述：</label>
				<input name="description" class="required" type="text" size="30" value="{{$data['description']}}" alt="描述"/>
			</p>
			<p>
				<label>浏览量：</label>
				<input name="view" class="required" type="text" size="30" value="{{$data['view']}}" alt="浏览量"/>
			</p>
			<p>
				<label>排序：</label>
				<input name="order" class="required" type="text" size="30" value="{{$data['order']}}" alt="排序"/>
			</p>
			<p>
				<label>所属分类：</label>
				<input name="cate.pid" value="0" type="hidden"/>
				<input class="required" name="cate.catetName" type="text" value="0" readonly/>
				<a class="btnLook" href="{{url('/admin/blog/cate/tree-lookup')}}" lookupGroup="cate">查找带回</a>
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
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>
