@extends('layouts.adminbase')
@section('content')
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <form class="am-form" action='role'>
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
            <select data-am-selected="{btnSize: 'sm'}" name="role_type">
              <option value=" " {{$role_type==" "?"selected":""}}>全部</option>
              <option value="menu" {{$role_type=="menu"?"selected":""}}>菜单类</option>
              <option value="operation" {{$role_type=="operation"?"selected":""}}>操作类</option>
            </select>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field " name="search" value="{{$search}}">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-primary" type="submit">搜索</button>
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
                  <th>角色启用状态</th>
                  <th class="table-date am-hide-sm-only">创建时间</th>
                  <th class="table-set">功能</th>
                </tr>
              </thead>
              <tbody id="tbody">
                @foreach ($roles as $role)
                 <tr>
                  <td><input type="checkbox" /></td>
                  <td><input class='role_id' type="hidden" value="{{ $role->id }}" >{{ $role->id }}</td>
                  <td>{{$role->role_name}}</td>
                  <td>{{$role->role_describe}}</td>
                  <td class="am-hide-sm-only">{{$role->role_type}}</td>
                  <td><input type="hidden" class='role_status' value='{{ $role->role_status }}'><span>{{$role->role_status==1?'已启用':'已禁用'}}</span></td>
                  <td class="am-hide-sm-only">{{$role->created_at}}</td>
                  <td>
                    <div class="am-btn-group am-btn-group-xs">
                      <button type="button" class="am-btn am-btn-primary am-radius single_edit"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button type="button" class="am-btn {{$role->role_status==1?'am-btn-warning':'am-btn-success'}}  am-radius single_enabled"><span class="am-icon-copy"></span> {{$role->role_status==1?'禁用':'启用'}}</button>
                      <button type="button" class="am-btn am-btn-danger am-radius single_delete"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="am-cf">
              <div class="am-fr">
                 {!! $roles->appends('search',$search)->links() !!}
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
            content: 'add_role'
          });
  })



  $('.single_edit').click(function(){
    var role_id=$(this).parent().parent().parent().find('.role_id').attr('value')
    
    layer.open({
      type:2,
      title:'编辑角色',
      shadeClose:true,
      shade:false,
      maxmin:true,
      area:['893px','600px'],
      content:'add_role?role_id='+role_id   //傳參數給add_role方法，然後判斷是增加還是編輯，如果編輯則將已經存在的角色信息返回到編輯界面，在編輯界面提交給後台，後台判斷是否傳入ID信息，如果有id信息，則更新，否則，再增加
    });
  });
  $('.single_enabled').click(function(){
    var index = layer.load(1, {
        shade: [0.1,'#fff'] //0.1透明度的白色背景
    });
    var thisbutton = $(this);
    var role_id=$(this).parent().parent().parent().find('.role_id').attr('value')
    var this_ob=        $(thisbutton).parent().parent().parent().find('.role_status'); //狀態單元格
    var role_status = $(this_ob).attr('value') //單元格的數據
    $.ajax({
      url:'enable_role',
      type:'get',
      data:{'role_id':role_id,'role_status':role_status},
      dataType:'json',
      success:function(data){
        if (data) {
          if(role_status==1){
                  $(thisbutton).removeClass('am-btn-warning').addClass('am-btn-success').html("<span class='am-icon-copy'></span> 启用");
                  $(this_ob).attr('value',0).parent().find('span').text('已禁用')
                }else{
                  $(thisbutton).removeClass('am-btn-success').addClass('am-btn-warning').html("<span class='am-icon-copy'></span> 禁用");
                  $(this_ob).attr('value',1).parent().find('span').text('已启用')      
                }
        }
        layer.close(index)
      }
    })

  })
 


// 單個刪除功能
$('.single_delete').click(function() {
    
    var tr = $(this).parent().parent().parent(); //獲取整行數據,以備後續js返回成功后刪除
    var role_id = $(this).parent().parent().parent().find('.role_id').attr('value') //獲取要刪除的role_id
        // layer 彈框控件
    layer.confirm('是否确认删除该角色？', {
            btn: ['是', '否']
        },
        function() {
            var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
            $.ajax({
                url: "delete_role",
                type: 'get',
                data: {
                    'role_id': role_id
                },
                dataType: 'json',
                success: function(data) {
                    if (data > 0) {
                        layer.msg(data + '条删除成功！', {
                            icon: 1
                        });
                        $(tr).remove();
                    } else {
                        layer.msg('数据删除失败', {
                            icon: 2
                        });
                    }
                }
            });
            layer.close(index);
        },
        function() {
            layer.msg('已经取消删除', {
                icon: 7
            });
            layer.close(index);
        });
})



</script>

@endsection