<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TestView</title>
        <script src="{{asset('js/lib/jquery/dist/jquery.js')}}" type="text/javascript" charset="utf-8" ></script>
        <script src="{{asset('js/lib/zui/dist/js/zui.js')}}" type="text/javascript" charset="utf-8"  ></script>
        <script src="{{asset('js/lib/zui/dist/lib/kindeditor/kindeditor.js')}}" type="text/javascript"></script>
    
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('js/lib/zui/dist/css/zui.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('js/lib/zui/dist/lib/kindeditor/kindeditor.css')}}">
    </head>
    <body>
        <div class="container" style="background: red">
            <h1 class="text-primary hl-green" >这是一个测试标题1</h1>
            <div class="center-block" style="background:#FFF0D5">...</div>
            <div class="center-block"> <button class="btn-primary btn-lg" type="button" onclick="alert(1)">大尺寸按钮</button> </div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                </div>
            </div>
            <span class="label label-success">Success</span>
            <hr>
            <div class="switch">
                <input type="checkbox">
                <label>夜间模式</label>
            </div>
            <img src="http://zui.sexy/docs/img/img1.jpg" width="200px" height="200px" class="img-rounded" alt="圆角图片">
            <div class="alert alert-warning">
                <h1>测试</h1>
                <hr>
                <h3>测试完了</h3>
            </div>
            <textarea id="content" name="content" class="form-control kindeditor" style="height:150px;">Hello, world!</textarea>
            <hr>
            <div id="uploaderExample" class="uploader">
                <div class="file-list" data-drag-placeholder="请拖拽文件到此处"></div>
                <button type="button" class="btn btn-primary uploader-btn-browse"><i class="icon icon-cloud-upload"></i> 选择文件</button>
            </div>
        </div>
    </body>
    
   <script type="text/javascript">

    KindEditor.create('textarea.kindeditor', {
      basePath: '/dist/lib/kindeditor/',
      allowFileManager : true,
      bodyClass : 'article-content'
    });

    $('#uploaderExample').uploader({
      autoUpload: true,            // 当选择文件后立即自动进行上传操作
      url: 'your/file/upload/url'  // 文件上传提交地址
    });

    </script>
</html>