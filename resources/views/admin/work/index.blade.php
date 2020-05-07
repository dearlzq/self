<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>信息展示</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form>
    <th width="70">名称:</th>
    <!--查询关键词-->
    <td><input type="text" name="w_name" value="{{$w_name}}" placeholder="请输入名称"></td>
    <th width="70">身份证:</th>
    <td><input type="text" name="w_card" value="{{$w_card}}" placeholder="请输入身份证"></td>
    <td><input type="submit" name="sub" value="查询"></td>
</form>

<center><h2>信息展示</h2></center>
<table class="table table-hover">
    <thead>
    <tr>
        <th>id</th>
        <th>名字</th>
        <th>年龄</th>
        <th>身份证</th>
        <th>头像</th>
        <th>是否湖北人</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    </thead>

    <tbody>
    @foreach($workInfo as $v)
        <tr>
            <td>{{$v->w_id}}</td>
            <td>{{$v->w_name}}</td>
            <td>{{$v->w_age}}</td>
            <td>{{$v->w_card}}</td>
            <td><img src="{{env('UPLOADS_URL')}}{{$v->w_img}}" alt="" width="100"></td>
            <td>{{$v->w_is == '1'?'是' :'否'}}</td>
            <td>{{date('Y-m-d H:i:s',$v->w_create)}}</td>
            <td>
                <a href="{{url('/work/destroy/'.$v->w_id)}}" class="btn btn-danger">删除</a>
                <a href="{{url('/work/edit/'.$v->w_id)}}" class="btn btn-primary">编辑</a>
            </td>
        </tr>
    @endforeach
        <tr colspan="8">
            <td>{{$workInfo->appends(['w_name'=>$w_name,'w_card'=>$w_card])->links()}}</td>
        </tr>

    </tbody>

</table>

</body>
</html>
<a href="{{url('work/create')}}" class="btn btn-link">添加</a>
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
