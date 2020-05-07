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
