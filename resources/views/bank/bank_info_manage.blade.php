@extends('layouts.adminbase')
@section('content')
<!-- content start -->
<style type="text/css">  
     
    #container{height:100%}  
</style>  
<div id="container"></div>
<!-- content end -->

<script type="text/javascript"> 
var map = new BMap.Map("container");
// 创建地图实例  
var point = new BMap.Point(116.404, 39.915);
// 创建点坐标  
map.centerAndZoom(point, 15);
// 初始化地图，设置中心点坐标和地图级别  
</script> 


@endsection