<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Action;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $a_title = request()->a_title;
        $where = [];
        if($a_title) {
            $where[] = ['a_title','like',"%$a_title%"];
        }
        $pageSize = config('app.pageSize');
        $action = Action::where($where)->paginate($pageSize);
        if(request()->ajax()) {
            return view('admin.action.ajax',['actionInfo'=>$action,'a_title'=>$a_title]);
        }
        return view('admin.action.index',['actionInfo'=>$action,'a_title'=>$a_title]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.action.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = request()->except('_token');
        $data['a_create'] = time();
        $res = Action::insert($data);
        if($res) {
            return redirect('action');
        }
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
        $res = Action::find($id);
        return view('admin.action.edit',['res'=>$res]);
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
        $data['a_create'] = time();
        $res = Action::where('a_id',$id)->update($data);
//        dd($res);
        if($res) {
            return redirect('/action');
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
        $res = Action::destroy($id);
        if($res) {
            return redirect('/action');
        }
    }
}
