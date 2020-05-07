<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Work;
use Illuminate\Validation\Rule;
use App\Http\Requests\WorkPost;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $w_name = request()->w_name;
        $w_card = request()->w_card;
        $where = [];
        if($w_name) {
            $where[] = ['w_name','like',"%$w_name%"];
        }
        if($w_name) {
            $where[] = ['w_card','like',"%$w_card%"];
        }
        $pageSize = config('app.pageSize');
        $work = Work::where($where)->paginate($pageSize);
        if(request()->ajax()) {
            return view('admin.work.ajax',['workInfo'=>$work,'w_name'=>$w_name,'w_card'=>$w_card]);

        }
        return view('admin.work.index',['workInfo'=>$work,'w_name'=>$w_name,'w_card'=>$w_card]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkPost $request)
    {
        //
        $data = request()->except('_token');
        $data['w_create'] = time();

        //文件上传
        if ($request->hasFile('w_img')) {
            //
            $data['w_img'] = $this->upload('w_img');

        }

        $res = Work::insert($data);
        if($res) {
            return redirect('work');
        }
    }

    //文件上传
    function upload($filename)
    {
        //上传过程是否有错，
        if (request()->file($filename)->isValid()){
            //接收上传
            $file = request()->$filename;
            //实现上传
            $path =$file->store('uploads');
            return $path;

        }
        exit('文件上传出错');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $res = Work::find($id);
        return view('admin.work.edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = request()->except('_token');
        $data['w_create'] = time();

        //文件上传
        if ($request->hasFile('w_img')) {
            //
            $data['w_img'] = $this->upload('w_img');

        }

        $res = Work::where('w_id',$id)->update($data);
        if($res) {
            return redirect('work');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = Work::destroy($id);
        if($res) {
            return redirect('work');
        }
    }
}
