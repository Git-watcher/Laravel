<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //加载
    public function index()
    {
        return view('login/index');
    }

    public function login(Request $request)
    {

        //验证 逻辑 渲染
        $request->flash();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'is_remember' => 'integer'
        ]);

//        $email=$request->email;
//        $password=bcrypt($request->password);
        $user = request(['email', 'password']);
        $is_remember = boolval($request->is_remember);

        if (Auth::attempt($user, $is_remember)) {
            return redirect('/posts')->with('success', "Yeah");
        }

        //login错误 可以携带withErrors 前台提示
        return back()->withErrors('warning');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/posts')->with('success', "Bye");
    }
}
