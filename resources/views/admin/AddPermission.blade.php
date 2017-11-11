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
						<form class="am-form am-form-horizontal" action="/admin/add_permission_fun" method="post">
							<div class="am-form-group">
								<label class="am-u-sm-12 am-u-md-2 am-form-label">权限名称</label>
								<div class="am-u-sm-12 am-u-md-10">
									<input type="text" class="am-input-sm"   name='permission_name' placeholder="请输入英文的权限名称">
								</div>
							</div>
							<div class="am-form-group">
								<label class="am-u-sm-12 am-u-md-2 am-form-label">权限描述</label>
								<div class="am-u-sm-12 am-u-md-10">
									<input type="text" class="am-input-sm"   placeholder="请输入权限的中文描述">
								</div>
							</div>

							<div class="am-form-group">
								<label class="am-u-sm-12 am-u-md-2 am-form-label">权限分类</label>
								<div class="am-u-sm-12 am-u-md-10">
									
									<select name="test" data-am-selected>
										<option value="a">菜单类</option>
										<option value="b" selected>操作类</option>
									</select>
									
								</div>
							</div>
							<div class="am-form-group">
								<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">状态</label>
								<div class="am-u-sm-12 am-u-md-10">
									<label class="am-switch">
										<input type="checkbox">
										<span class="am-switch-checkbox"></span>
									</label>
								</div>
							</div>
							<!-- <div class="am-form-group">
								<label for="user-weibo" class="am-u-sm-2 am-form-label">状态</label>
								<div class="am-u-sm-10">
									<label class="am-checkbox-inline">
										<input type="checkbox"  value="" data-am-ucheck> 启用
									</label>
									<label class="am-checkbox-inline">
										<input type="checkbox"  value="" data-am-ucheck> 禁用
									</label>
								</div>
							</div> -->
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
	</body>
</html>