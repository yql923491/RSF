<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>增加银行</title>
		<link href="{{ asset('AmazeUI/css/amazeui.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('AmazeUI/css/admin.css')}}">
		<link rel="stylesheet" href="{{asset('AmazeUI/css/amazeui.address.min.css')}}"/>
		<script src="{{ asset('AmazeUI/js/jquery.min.js') }}"></script>
		<script src="{{ asset('AmazeUI/js/amazeui.js') }}"></script>
		<script src="{{ asset('AmazeUI/js/iscroll.min.js')}}"></script>
		<script src="{{ asset('AmazeUI/js/address.min.js') }}"></script>
		<script src="{{ asset('AmazeUI/js/app.js')}}"></script>
		<script src="{{ asset('layer/layer.js')}}"></script>
		
		<script src="{{ asset('photoClip-master/dist/iscroll-zoom.min.js')}}"></script> 
		<script src="{{ asset('photoClip-master/dist/hammer.min.js')}}"></script> 
		<script src="{{ asset('photoClip-master/dist/photoClip.min.js')}}"></script>

		<style type="text/css">
			#clip {
				width: 100%;
				height: 400px;
			}
		</style>
	</head>
	<body>
		<div class="am-cf admin-main">
			<!-- content start -->
			<div class="admin-content">
				<div class="admin-content-body">
					<div class="am-cf am-padding"></div>
					<div class="am-g">
						<div class="am-u-sm-12">
							<form class="am-form am-form-horizontal" action="/BankManage/add_bank_fun" method="get">
								<input type="hidden" name='permission_id' value=''>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行名称</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"   name='bank_name' placeholder="请输入银行名称" value="">
									</div>
								</div>


								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">LOGO</label>
									<div class="am-u-sm-12 am-u-md-10">
											<div class="am-popup" id="my-popup">
												<div class="am-popup-inner">
													<div class="am-popup-hd">
														<h4 class="am-popup-title">裁剪图片</h4>
														<span data-am-modal-close class="am-close">&times;</span>
													</div>
													<div class="am-popup-bd">
														<!-- 裁剪显示区 -->
														<div class="am-margin-bottom-sm" id="clip"></div>
														<button type="button" class="am-btn am-btn-primary" id="clipBtn">
															裁剪
														</button>
														<input class="am-hide" type="file" id="bank_logo">
													</div>
												</div>
											</div>

											<div>
												<img class="am-img-circle am-img-thumbnail" src="{{asset('img/logo.jpg')}}" id="img-view"  style="width:20%" />
												<br>
												<button type="button" class="am-btn am-btn-primary" id="toggle-file">上传LOGO</button>
											</div>
									</div>
								</div>

								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行级别</label>
									<div class="am-u-sm-12 am-u-md-10">
										<select name="bank_level" data-am-selected>
											<option value="1" >总行</option>
											<option value="2">省级分行</option>
											<option value="3">市级分行</option>
											<option value="4">县级分行</option>
										</select>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行类型</label>
									<div class="am-u-sm-12 am-u-md-10">
										<select name="bank_type" data-am-selected>
											<option value="1">国有银行</option>
											<option value="2">农商行</option>
											<option value="3">民营银行</option>
											<option value="4">农村信合</option>
											<option value="5">外资银行</option>
										</select>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行地址</label>
									<div class="am-u-sm-12 am-u-md-10" >
											<div class="am-form-group am-input-group" id="address">
												<input  type="text" name="address1" class="am-form-field am-radius" placeholder="请选择省市区" > 
											</div>
											<input type="text" value="" name="address2" placeholder="请输入详细地址">
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">联系人名称</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"  name='bank_contacts'  value="" placeholder="请填写联系人名称">
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">联系人电话</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"  name='bank_contacts'  value="" placeholder="请填写联系人电话">
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
		$(function() { 
			// 地址选择
			$('#address').address();  

			// 图片裁剪
			var $clip = $("#clip");
			var $file = $("#bank_logo");
			var $imgView = $("#img-view");
			var $popup = $("#my-popup");
			$("#toggle-file").click(function() {
				$file.trigger("click");
				$popup.modal({
					closeViaDimmer: false
				});
			});

			$clip.photoClip({
				width: 250,
				height: 250,
				fileMinSize: 20,
				file: $file,
				ok: "#clipBtn",
				loadStart: function() {
					console.log("照片读取中");
				},
				loadProgress: function(progress) {
					console.log(progress);
				},
				loadError: function() {
					console.log("图片加载失败");
				},
				loadComplete: function() {
					console.log("照片读取完成");
				},
				imgSizeMin: function(kbs) {
					console.log(kbs, "上传图片过小");
				},
				clipFinish: function(dataURL) {
					document.getElementById("img-view").src = dataURL;
					$popup.modal("close");
				}
			});
		})






		

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