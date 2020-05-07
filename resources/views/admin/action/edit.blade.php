<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章内容修改</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<center><h2>文章内容修改</h2></center>

<form class="form-horizontal" action="{{url('/action/update/'.$res->a_id)}}" method="post" role="form">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$res->a_title}}" name="a_title" id="firstname" placeholder="请输入文章标题">
            <b style="color: red">{{$errors->first('a_title')}}</b>

        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">作者</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$res->a_author}}" name="a_author" id="lastname" placeholder="作者">
            <b style="color: red">{{$errors->first('a_author')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">内容</label>
        <div class="col-sm-10">
            <textarea name="a_infor" class="form-control"  id="" cols="30" rows="10">{{$res->a_infor}}</textarea>
            <b style="color: red">{{$errors->first('a_infor')}}</b>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>
</form>
</body>
</html>

<a href="{{url('action')}}" class="btn btn-link">展示</a>

