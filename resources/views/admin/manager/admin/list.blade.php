
<form id="pagerForm" method="post" action="#rel#">
	{!! csrf_field() !!}
	<input type="hidden" name="page" value="1" />
	
	<input type="hidden" name="numPerPage" value="20" />
</form>

<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="{{ route('admin.manager.admin.list') }}" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>管理员名称：</label>
				<input type="text" name="name" value=""/>
				{!! csrf_field() !!}
			</li>
			<li>
			</li>
		</ul>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>				
			</ul>
		</div>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="{{ route('admin.manager.admin.edit',['id'=>0])}}" target="navTab"><span>添加</span></a></li>
			<li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="ids"  postType="string" href="{{ url('/admin/manager/admin//batch-del')}}?_token={{csrf_token()}}" class="delete"><span>批量删除逗号分隔</span></a></li>
			<li><a class="edit" href="/admin/manager/admin//edit/{id}" target="navTab" warn="请选择一个分类"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="/admin/manager/admin//export" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
		</ul>
	</div>
	<table class="table" width="1200" layoutH="138">
		<thead>
			<tr>
				<th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
				<th width="22">序号</th>
				<th width="22" orderField="accountNo" class="asc">管理员号</th>
				<th width="50" orderField="accountName">管理员名称</th>
				<th width="50" orderField="accountName">邮箱地址</th>
				<th width="70">创建时间</th>
				<th width="70">最后一次登录时间</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($list['data'] as $k => $v) 
				<tr target="id" rel="{{$v['id']}}">
					<td><input name="ids" value="{{$v['id']}}" type="checkbox"></td>
					<td>{{$k+1}}</td>
					<td>{{$v['id']}}</td>
					<td>{{$v['name']}}</td>
					<td>{{$v['email']}}</td>
					<td>{{$v['created_at']}}</td>
					<td>{{$v['updated_at']}}</td>
					<td>
						<a title="删除" target="ajaxTodo" href="/admin/manager/admin/del/{{$v['id']}}?_token={{csrf_token()}}" class="btnDel">删除</a>
						<a title="编辑" target="navTab" href="{{ route('admin.manager.admin.edit',['id'=>$v['id']])}}" class="btnEdit">编辑</a>
						<a title="授权" target="navTab" href="/admin/manager/admin/accr-edit/{{$v['id']}}" class="btnxx">授权</a>
					</td>
				</tr>
			@endforeach
			</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共{{$list['total']}}条</span>
		</div>
		
		<div class="pagination" targetType="navTab" totalCount="{{$list['total']}}" numPerPage="{{$list['per_page']}}" pageNumShown="10" currentPage="{{$list['current_page']}}"></div>

	</div>
</div>
