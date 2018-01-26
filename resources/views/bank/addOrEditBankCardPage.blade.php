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
							<form class="am-form am-form-horizontal" action="/bank/addBankCard" method="get">
								<input type="hidden" name='bankCardId' value='{{$bankCard->id}}'>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行卡名称</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"   name='cardName' placeholder="请输入银行卡名称" value="{{$bankCard->cardName}}">
									</div>
								</div>


								
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">银行卡类型</label>
									<div class="am-u-sm-12 am-u-md-10">
										<select name="cardType" data-am-selected>
											<option value="1" {{$bankCard->cardType=="1"?"selected":""}}>借记卡</option>
											<option value="2"{{$bankCard->cardType=="2"?"selected":""}}>信用卡</option>
											<option value="3"{{$bankCard->cardType=="3"?"selected":""}}>社保卡</option>
											<option value="4"{{$bankCard->cardType=="4"?"selected":""}}>其它</option>
										</select>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-12 am-u-md-2 am-form-label">发行银行</label>
									<div class="am-u-sm-12 am-u-md-10">
										<select name="cardBank" data-am-selected>
											<option value="1"{{$bankCard->cardBank=="1"?"selected":""}}>国有银行</option>
											<option value="2"{{$bankCard->cardBank=="2"?"selected":""}}>农商行</option>
											<option value="3"{{$bankCard->cardBank=="3"?"selected":""}}>民营银行</option>
											<option value="4"{{$bankCard->cardBank=="4"?"selected":""}}>农村信合</option>
											<option value="5"{{$bankCard->cardBank=="5"?"selected":""}}>外资银行</option>
										</select>
									</div>
								</div>
								
								<div class="am-form-group">
									<label for="user-weibo" class="am-u-sm-12 am-u-md-2 am-form-label">银行卡详细信息</label>
									<div class="am-u-sm-12 am-u-md-10">
										<input type="text" class="am-input-sm"  name='cardInfo'  value="{{$bankCard->cardInfo}}" placeholder="请填写银行卡详细信息">
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