@extends('layouts.adminbase')
@section('content')
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <form class="am-form" action='{{route("permission_indexss")}}'>
      <div class="am-cf am-padding">
      </div>
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button id='add_permission' type="button" class="am-btn am-btn-default am-btn-primary"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default am-btn-primary"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}" name="permission_type" >
              <option value=" " {{$permission_type==' '?'selected':''}}>全部</option>
              <option value="menu" {{$permission_type=='menu'?'selected':''}}>菜单类</option>
              <option value="operation" {{$permission_type=='operation'?'selected':''}}>操作类</option>
            </select>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field" name="search" value="{{$search}}">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-primary" type="submit" >搜索</button>
            </span>
          </div>
        </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
          
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
                <tr>
                  <th class="table-check"><input type="checkbox" id='selectall'/></th><th class="table-id">ID</th>
                  <th class="table-title">权限名称</th>
                  <th class="table-type">权限描述</th>
                  <th class="table-type">是否启用</th>
                  <th class="table-author am-hide-sm-only">权限类别</th>
                  <th class="table-date am-hide-sm-only">创建时间</th>
                  <th class="table-set">功能</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $permission)
                 <tr>
                  <td><input type="checkbox" /></td>
                  <td><input type='hidden' class="permission_id" value='{{$permission->id}}'> {{ $permission->id }}</td>
                  <td>{{$permission->permission_name}}</td>
                  <td>{{$permission->permission_describe}}</td>
                  <td>{{$permission->permission_status==1?"已启用":"未启用"}}</td>
                  <td class="am-hide-sm-only">{{$permission->permission_type}}</td>
                  <td class="am-hide-sm-only">{{$permission->created_at}}</td>
                  <td>
                    <div class="am-btn-group am-btn-group-xs">
                      <button type="button" class="am-btn am-btn-primary am-radius"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button type="button" class="am-btn {{ $permission->permission_status == 1 ? 'am-btn-warning' : 'am-btn-success' }} am-radius single_enabled"><span class="am-icon-copy"></span> <input type="hidden" name="permission_status" value='{{$permission->permission_status}}' class='permission_status'> {{ $permission->permission_status == 1 ? '停用' : '启用' }} </button>
                      <button type="button" class="am-btn am-btn-danger am-radius single_delete"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </td>
                </tr>
                @endforeach
  
               
              <!-- <tr><hr></tr> -->
              

              

              </tbody>
            </table>
            <div class="am-cf">
              <div class="am-fr">
                 {!! $permissions->appends('search',$search)->links() !!}
                <!-- <ul class="am-pagination">
                  <li class="am-disabled"><a href="#">«</a></li>
                  <li class="am-active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">»</a></li>
                </ul> -->
              </div>
            </div>
            <hr />
            
          </form>
        </div>
      </div>
      
      
      
    </div>
  </div>
</div>
<!-- content end -->
</div>
<script type="text/javascript" charset="utf-8" async defer>

// 新增权限弹出按钮
  $('#add_permission').click(function(){

          layer.open({
            type: 2,
            title: '增加权限',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['893px', '600px'],
            content: '/admin/add_permission'
          });
  })

 // 全选按钮
  $('#selectall').click(function(){
    if($(this).prop('checked')){
     $('input').prop('checked',true)
    }else{
      $('input').prop('checked',false)
    }
  })



 $('.single_delete').click(function(){
  var tr =$(this).parent().parent().parent()
  var permission_id = $(this).parent().parent().parent().find('.permission_id').attr('value')
  
  layer.confirm('是否确认删除该角色？', 
    {btn: ['是','否']}, 
    function(){
      // 获取到要删除的ID
      // 向后台提交
    $.ajax({ 
       url: "delete_permission", 
       type:'get',
       data: {'permission_id':permission_id}, 
       dataType:'json',
       success: function(data){
        if(data>0){
          layer.msg(data+'条删除成功！', {icon: 1});
          $(tr).remove();
        }else{
          layer.msg('数据删除失败', {icon: 2});
        }
        
       }
     });
      // 删除成功后在前端页面删除
      
    }, 
    function(){
      layer.msg('已经取消删除', {icon: 7});
    });
})


$('.single_enabled').click(function(){
  var permission_id = $(this).parent().parent().parent().find('.permission_id').attr('value')
  var permission_status = $(this).parent().parent().parent().find('.permission_status').attr('value')

  $.get("enable_permission",{'permission_id':permission_id,'permission_status':permission_status},
  function(data){
    if(data){
      window.location.reload();
    }
  },
  "json");//这里返回的类型有：json,html,xml,text


})


</script>

@endsection