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
    <td>{{$workInfo->appends(['w_name'=>$w_name])->links()}}</td>
</tr>
