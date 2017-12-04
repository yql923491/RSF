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
              <button id='add_role' type="button" class="am-btn am-btn-default am-btn-primary"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default am-btn-primary"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}">
              <option value="option1">全部</option>
              <option value="option2">菜单类</option>
              <option value="option3">操作类</option>
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
                  <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th>
                  <th class="table-title">角色名称</th>
                  <th class="table-type">角色描述</th>
                  <th class="table-author am-hide-sm-only">角色类别</th>
                  <th class="table-date am-hide-sm-only">创建时间</th>
                  <th class="table-set">功能</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                 <tr>
                  <td><input type="checkbox" /></td>
                  <td><input class='role_id' type="hidden" value="{{ $role->id }}" name='role_id'>{{ $role->id }}</td>
                  <td>{{$role->role_name}}</td>
                  <td>{{$role->role_describe}}</td>
                  <td class="am-hide-sm-only">{{$role->role_type}}</td>
                  <td class="am-hide-sm-only">{{$role->created_at}}</td>
                  <td>
                    <div class="am-btn-group am-btn-group-xs">
                      <button type="button" class="am-btn am-btn-primary am-radius"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button type="button" class="am-btn am-btn-warning am-radius"><span class="am-icon-copy"></span> 停用</button>
                      <button type="button" class="am-btn am-btn-danger am-radius single_delete" onclick='single_delete(this)' ><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </td>
                </tr>
                @endforeach
  
               
              
              

              

              </tbody>
            </table>
            <div class="am-cf">
              <div class="am-fr">
                 {!! $roles->appends('search',$search)->links() !!}
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

  $('#add_role').click(function(){

          layer.open({
            type: 2,
            title: '增加角色',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['893px', '600px'],
            content: '/admin/add_role'
          });
  })
 


function single_delete(){
  console.log($(this))
  layer.confirm('是否确认删除该角色？', {
      btn: ['是','否'] //按钮
    }, function(){
      // 获取到要删除的ID
      
      // 向后台提交

      // 删除成功后在前端页面删除

    }, function(){
       layer.msg('已经取消删除', {icon: 1});
    });
}


// $('.single_delete').click(function(){
    

// })



</script>

@endsection