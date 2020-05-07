<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admins;

class LoginController extends Controller
{
    //
    public function dologin(Request $request)
    {
        //
        $data = request()->post();
        $admin = Admins::where('a_name',$data['a_name'])->first();
        if(decrypt($admin->a_pwd) != $data['a_pwd']) {
            return redirect('/login')->with('msg','用户名或者密码不对');
        }
        session(['admin'=>$admin]);
        return redirect('/work');

    }
}
