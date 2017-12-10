<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>增加权限</title>
		<link href="{{ asset('AmazeUI/css/amazeui.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('AmazeUI/css/admin.css')}}">
		<script src="{{ asset('js/lib/jquery/dist/jquery.js') }}"></script>
		<script src="{{ asset('AmazeUI/js/amazeui.js') }}"></script>
		<script src="{{ asset('AmazeUI/js/app.js')}}"></script>
		<script src="{{ asset('/layer/layer.js')}}"></script>
	</head>
	<body>
		<div class="am-cf admin-main">
			<!-- content start -->
			<div class="admin-content">
				<div class="admin-content-body">
					<div class="am-cf am-padding"></div>
					<div class="am-g">
						<div class="am-u-sm-12">
							<form class="am-form am-form-horizontal" action="/admin/add_permission_fun" method="get">
								<input type="hidden" name='permission_id' value='{{$permission->id}}'>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">权限名称</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"   name='permission_name' placeholder="请输入英文的权限名称" value="{{$permission->permission_name}}">
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">权限描述</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"  name='permission_describe'  value="{{$permission->permission_describe}}" placeholder="请输入权限的中文描述">
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">权限分类</label>
									<div class="am-u-sm-12 am-u-md-10">
										
										<select name="permission_type" data-am-selected>
											<option value="menu" {{$permission->permission_type=="menu"?"selected":""}}>菜单类</option>
											<option value="operation" {{$permission->permission_type!="menu"?"selected":""}}>操作类</option>
										</select>
										
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">状态</label>
									<div class="am-u-sm-12 am-u-md-10">
										<label class="am-switch">
											<input class="permission_status" type="checkbox" name="permission_status" value="{{$permission->permission_status}}" {{$permission->permission_status==1?'checked':''}}>
											<span class="am-switch-checkbox"></span>
										</label>
									</div>
								</div>
								{{ csrf_field() }}
								<div class="am-form-group">
									<div class="am-u-sm-12 am-u-md-10 am-u-md-push-2">
										<button type="submit" class="am-btn am-btn-primary">保存</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
		<!-- content end -->
	</div>
	<script type="text/javascript" charset="utf-8" async defer>	
		
		$('.permission_status').change(function(){
			if($(this).prop('checked')){
				$(this).attr('value',1);
			}else{
				$(this).attr('value',0);
			};
		})

		$('form').submit(function(){
			$.ajax({ 
				url: $(this).attr('action'), 
				type:'get',
				data:$(this).serializeArray(),
				success: function(){
					// 治理要关闭当前弹窗同时刷新父窗口
					window.parent.location.reload();
				}
			});
			return false;
		})
	</script>
</body>
</html>