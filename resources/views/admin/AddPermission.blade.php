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
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">权限名称</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"   name='permission_name' placeholder="请输入英文的权限名称">
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">权限描述</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"  name='permission_describe'  placeholder="请输入权限的中文描述">
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">权限分类</label>
									<div class="am-u-sm-12 am-u-md-10">
										
										<select name="permission_type" data-am-selected>
											<option value="meun">菜单类</option>
											<option value="operation" selected>操作类</option>
										</select>
										
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">状态</label>
									<div class="am-u-sm-12 am-u-md-10">
										<label class="am-switch">
											<input type="checkbox" name="permission_status" value="1">
											<span class="am-switch-checkbox"></span>
										</label>
									</div>
								</div>
								{{ csrf_field() }}
								<div class="am-form-group">
									<div class="am-u-sm-12 am-u-md-10 am-u-md-push-2">
										<button type="submit" class="am-btn am-btn-primary">添加</button>
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
		// $('form').submit(function(){
		// 	$.ajax({ 
		// 		url: $(this).attr('action'), 
		// 		type:'get',
		// 		data:$(this).serializeArray(),
		// 		success: function(){
		// 			alert('提交成功');
		// 		}
		// 	});
		// 	return false;
		// })
	</script>
</body>
</html>