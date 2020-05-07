<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>外来务工人员</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<center><h2>外来务工人员添加</h2></center>

<form class="form-horizontal" action="{{url('/work/store')}}" method="post" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">名字</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="w_name" id="firstname" placeholder="请输入名字">
            <b style="color: red">{{$errors->first('w_name')}}</b>

        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">年龄</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="w_age" id="lastname" placeholder="年龄">
            <b style="color: red">{{$errors->first('w_age')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">身份证</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="w_card" id="lastname" placeholder="身份证">
            <b style="color: red">{{$errors->first('w_card')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">LOGO</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="w_img" id="lastname" placeholder="请输入LOGO">
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">是否湖北人</label>
        <input type="radio" name="w_is" id="name" value="1" checked>是
        <input type="radio" name="w_is" id="name" value="2">否
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>
</body>
</html>

<a href="{{url('work')}}" class="btn btn-link">展示</a>

