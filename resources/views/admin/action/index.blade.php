<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>品牌展示</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form>
    <th width="70">文章名称:</th>
    <!--查询关键词-->
    <td><input type="text" name="a_title" value="{{$a_title}}" placeholder="请输入文章名称"></td>
    <td><input type="submit" name="sub" value="查询"></td>
</form>

<center><h2>文章展示</h2></center>
<table class="table table-hover">
    <thead>
    <tr>
        <th>文章id</th>
        <th>文章名称</th>
        <th>文章作者</th>
        <th>文章内容</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    </thead>

        <tbody>
        @foreach($actionInfo as $v)
        <tr>
            <td>{{$v->a_id}}</td>
            <td>{{$v->a_title}}</td>
            <td>{{$v->a_author}}</td>
            <td>{{$v->a_infor}}</td>
            <td>{{date('Y-m-d H:i:s',$v->a_create)}}</td>
            <td>
                <a href="{{url('/action/destroy/'.$v->a_id)}}" class="btn btn-danger">删除</a>
                <a href="{{url('/action/edit/'.$v->a_id)}}" class="btn btn-primary">编辑</a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="6">
                {{ $actionInfo->appends(['a_title'=>$a_title])->links() }}
            </td>
        </tr>
        </tbody>

</table>

</body>
</html>
<a href="{{url('action/create')}}" class="btn btn-link">添加</a>
<script>
   $(function () {
       $(document).on('click','.page-item a',function() {
           var url =$(this).attr('href');
           // alert(url);
           // return false;
           $.get(url,function(res) {
               $('tbody').html(res);
           });
           return false;
       });
   })
</script>
