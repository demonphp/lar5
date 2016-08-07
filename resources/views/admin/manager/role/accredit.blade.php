<div class="pageContent">
	<form method="post" action="/admin/manager/role/accr-save"  class="pageForm required-validate" onsubmit="return iframeCallback(this);">
		<div class="pageFormContent" layoutH="56">
			{!! csrf_field() !!}
			<input type="hidden" value="{{$role['id']}}" name="id">
			@foreach($permissions as $tree)
				<div class="panel" >
					<h1><input class="permission permission_all" type="checkbox" name="permission_id[]" value="{{ $tree['id'] }}" />{{ $tree['display_name'] }}</h1>
					@if(isset($tree['_child']))
						@foreach($tree['_child'] as $tree2)
						<div>
							<div class="rule_check" >
								<div>
									<input type="checkbox" name="permission_id[]" class="permission permission_row" value="{{ $tree2['id'] }}" /> {{ $tree2['display_name'] }}
								</div>
								@if(isset($tree2['_child']))
									<div class="child_row">
										@foreach($tree2['_child'] as $tree3)
											<input type="checkbox" class="permission" name="permission_id[]"  value="{{ $tree3['id'] }}" />{{ $tree3['display_name'] }}
										@endforeach
									</div>
								@endif

							</div>
						</div>
						@endforeach
					@endif
				</div>
			@endforeach
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>
<script>
	+function($){
		var permissionArray =  jQuery.parseJSON("{{ $thisPermissionArray }}");
		//选择是否
		if(permissionArray){
			$('.permission').each(function(){
				if( $.inArray( parseInt(this.value),permissionArray ) > -1 ){
					$(this).prop('checked',true);
				}
			});
		}

		//全选
		$('.permission_all').on('change',function(){
			$(this).closest('.panel').find('input[type=checkbox]').prop('checked',this.checked);
		});

		//列选
		$('.permission_row').on('change',function(){
			$(this).closest('.rule_check').find('.child_row').find('input').prop('checked',this.checked);
		});
	}(jQuery);
</script>

