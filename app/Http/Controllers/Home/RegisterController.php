<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegisterController extends Controller
{
    //注册
    public function index()
    {
        return view('register/index');
    }

    public function register(Request $request)
    {
        //闪存信息
        $request->flash();
        //验证 逻辑 渲染
        $this->validate($request, [
            'name' => 'required|min:3|max:10|unique:users,name',
            'email' => 'required|max:30|unique:users,email|email',
            'password' => 'required|min:6|max:16|confirmed'
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);
        User::create(compact(['name', 'email', 'password']));

        return redirect('/login')->with('success', '真是个大聪明');

    }
}
