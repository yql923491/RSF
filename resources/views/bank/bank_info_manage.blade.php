@extends('layouts.adminbase')
@section('content')

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=7tPpGQeMkYjyaOjiXCT5Yc0ygrL5Zkxp"/>
<!-- content start -->
<div class="admin-content">
<div id="container"></div> 
</div>

<!-- content end -->

<script type="text/javascript" charset="utf-8" async defer>

var map = new BMap.Map("container");
// 创建地图实例  
var point = new BMap.Point(116.404, 39.915);
// 创建点坐标  
map.centerAndZoom(point, 15);
// 初始化地图，设置中心点坐标和地图级别  

</script>
@endsection