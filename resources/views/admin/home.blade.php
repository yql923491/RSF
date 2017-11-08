@extends('layouts.adminbase')

@section('content')




<!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
        <ol class="am-breadcrumb">
  <li><a href="#" class="am-icon-home">首页</a></li>
  <li><a href="#">分类</a></li>
  <li class="am-active">内容</li>
</ol>
      </div>

      <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list am-text-sm">
        <li><a href="#" class="am-text-success"><div data-am-progressbar="{percentage:'100', type: 'circle' , size: 'sm'}"></div><br/>上月进度<br/>100%</a></li>
        <li><a href="#" class="am-text-primary"><div data-am-progressbar="{percentage:'40', type: 'circle' , size: 'sm'}"></div><br/>本月进度<br/>40%</a></li>
        <li><a href="#" class="am-text-danger"><div data-am-progressbar="{percentage:'97', type: 'circle' , status:'danger' , size: 'sm'}"></div><br/>本周进度<br/>97%</a></li>
        <li><a href="#" class="am-text-warning"><div data-am-progressbar="{percentage:'82', type: 'circle' , status:'warning' , size: 'sm'}"></div><br/>本日进度<br/>82%</a></li>
      </ul>

 <div class="am-g">
        <div class="am-u-sm-12">
          <table class="am-table am-table-bd am-table-striped admin-content-table">
            <thead>
            <tr>
              <th>ID</th><th>名字</th><th>执行情况</th><th>提交</th><th>管理</th>
            </tr>
            </thead>
            <tbody>
            <tr><td>1</td><td>John Clark</td><td><a href="#">Business management</a></td> <td><span class="am-badge am-badge-success">+20</span></td>
              <td>
                <div class="am-dropdown" data-am-dropdown>
                  <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                  <ul class="am-dropdown-content">
                    <li><a href="#">1. 编辑</a></li>
                    <li><a href="#">2. 下载</a></li>
                    <li><a href="#">3. 删除</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr><td>2</td><td>淡淡</td><td><a href="#">LOGO设计</a> </td><td><span class="am-badge am-badge-danger">+2</span></td>
              <td>
                <div class="am-dropdown" data-am-dropdown>
                  <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                  <ul class="am-dropdown-content">
                    <li><a href="#">1. 编辑</a></li>
                    <li><a href="#">2. 下载</a></li>
                    <li><a href="#">3. 删除</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr><td>3</td><td>水浪</td><td><a href="#">业务原型</a></td><td><span class="am-badge am-badge-warning">+10</span></td>
              <td>
                <div class="am-dropdown" data-am-dropdown>
                  <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                  <ul class="am-dropdown-content">
                    <li><a href="#">1. 编辑</a></li>
                    <li><a href="#">2. 下载</a></li>
                    <li><a href="#">3. 删除</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr><td>4</td><td>小云</td><td><a href="#">云端分享</a></td><td><span class="am-badge am-badge-secondary">+50</span></td>
              <td>
                <div class="am-dropdown" data-am-dropdown>
                  <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                  <ul class="am-dropdown-content">
                    <li><a href="#">1. 编辑</a></li>
                    <li><a href="#">2. 下载</a></li>
                    <li><a href="#">3. 删除</a></li>
                  </ul>
                </div>
              </td>
            </tr>

            <tr>
              <td>5</td><td>洛奇</td>
              <td><a href="#">原型设计</a></td>
              <td><span class="am-badge">+22</span></td>
              <td>
                <div class="am-dropdown" data-am-dropdown>
                  <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                  <ul class="am-dropdown-content">
                    <li><a href="#">1. 编辑</a></li>
                    <li><a href="#">2. 下载</a></li>
                    <li><a href="#">3. 删除</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="am-g">
  <div class="am-u-md-6">
          <div class="am-panel am-panel-primary">
    <div class="am-panel-hd">
      <div class="am-panel-title">分享文件</div>
    </div>
    <div class="am-panel-bd">
      <ul class="am-list admin-content-file admin-content-amendment">
        <li>
          <span class="am-icon-file-word-o"></span> 会议文件
          <p class="am-text-xs ">文件大小：5MB 还需要 5 分钟  速度：1MB/秒</p>
          <div data-am-progressbar="{percentage:'80', status:'danger'}"></div>
        </li>
        <li>
          <span class="am-icon-file-pdf-o"></span> 《乘风破浪》电子版
          <p class="am-text-xs ">文件大小：16MB</p>
          <div data-am-progressbar="{percentage:'100'}"></div>
        </li>
        <li>
          <span class="am-icon-file-pdf-o"></span> 旅游照片
          <p class="am-text-xs ">文件大小：12MB</p>
          <div data-am-progressbar="{percentage:'100'}"></div>
        </li>
      </ul>
    </div>
  </div>
</div>
        <div class="am-u-md-6">
            <div class="am-panel am-panel-primary">
    <div class="am-panel-hd">
      <div class="am-panel-title">计划情况</div>
    </div>
    <div class="am-panel-bd">
      <ul class="am-list admin-content-file">
               <li>
                  <div class="admin-task-meta"> CoolLook 计划 <span class="am-badge am-badge-success am-radius">mobilize</span></div>
                  <div class="admin-task-bd">
                    已与国内外很多厂商、方案商达成合作。和厂商的持续分成模式更稳定、长久。已经拿到全球相当数量的授权媒体，印度市场目前不存在资讯精准推送类产品，客观条件良好。
                  </div>
                  <div class="am-cf">
                    <div class="am-btn-toolbar am-fl">
                      <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-primary am-btn-default"><span class="am-icon-check"></span></button>
                        <button type="button" class="am-btn am-btn-primary am-btn-default"><span class="am-icon-pencil"></span></button>
                        <button type="button" class="am-btn am-btn-primary am-btn-default"><span class="am-icon-times"></span></button>
                      </div>
                    </div>
                    <div class="am-fr">
                      <button type="button" class="am-btn am-btn-danger am-btn-xs">删除</button>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="admin-task-meta"> 云分享 <span class="am-badge am-badge-success am-radius">Clo</span></div>
                  <div class="admin-task-bd">
                    已与国内外很多厂商、方案商达成合作。和厂商的持续分成模式更稳定、长久。已经拿到全球相当数量的授权媒体。
                  </div>
                  <div class="am-cf">
                    <div class="am-btn-toolbar am-fl">
                      <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-primary am-btn-default"><span class="am-icon-check"></span></button>
                        <button type="button" class="am-btn am-btn-primary am-btn-default"><span class="am-icon-pencil"></span></button>
                        <button type="button" class="am-btn am-btn-primary am-btn-default"><span class="am-icon-times"></span></button>
                      </div>
                    </div>
                    <div class="am-fr">
                      <button type="button" class="am-btn am-btn-danger am-btn-xs">删除</button>
                    </div>
                  </div>
                </li>
              </ul>
    </div>
  </div>

          </div>
     
        </div>
        
      </div>
    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>
  </div>
  <!-- content end -->


@endsection
