
<div class="pageContent">
	<form method="post" action="/admin/blog/art/save" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<p>
				<label>文章id：</label>
				<input name="id" type="text" size="30" value="{{$data['id']}}" readonly="readonly"/>
			</p>
			<p>
				<label>文章名称：</label>
				<input name="name" class="required" type="text" size="30" value="{{$data['name']}}" alt="请输入文章名称"/>
			</p>
			<p>
				<label>文章作者：</label>
				<input name="author" class="required" type="text" size="30" value="{{$data['author']}}" alt="请输入文章作者"/>
			</p>
			<p>
				<label>文章发布时间：</label>
				<input name="addtime" class="required" type="text" size="30" value="{{$data['addtime']}}" alt="请输入文章名称"/>
			</p>
			<p>
				<label>文章标题：</label>
				<input name="title" class="required" type="text" size="30" value="{{$data['title']}}" alt="文章标题"/>
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
				<input name="view" class="required" type="text" size="30" value="{{$data['view'] or 0}}" alt="浏览量"/>
			</p>
			<p>
				<label>排序：</label>
				<input name="order" class="required" type="text" size="30" value="{{$data['order'] or 0}}" alt="排序"/>
			</p>
			<p>
				<label>所属分类：</label>
				<input name="cate.id" value="0" type="hidden"/>
				<input class="required" name="cate.catetName" type="text" value="0" readonly/>
				<a class="btnLook" href="{{url('/admin/blog/cate/tree-lookup')}}" lookupGroup="art">查找带回</a>
			</p>
			<p>
				<label>创建 时间：</label>
				<input readonly="readonly" type="text" size="30" value="{{$data['created_at']}}" />
			</p>
			<p>
				<label>修改时间：</label>
				<input readonly="readonly" type="text" size="30" value="{{$data['updated_at']}}" />
			</p>
			<p>
				<label>文章缩略图:</label>
				<input name="thumb" type="file" />
			</p>
			<p>
				<label>文章内容：</label>
				<textarea class="editor" name="content" rows="20" cols="100">{{$data['content']}}</textarea>
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
