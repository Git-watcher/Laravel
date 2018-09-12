<?php

namespace App\Http\Controllers\Home;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function setting()
    {
        return view('user/setting');
    }

    public function settingstore(Request $request)
    {
        $path = $request->file('photo')->store(date('Y-m-d'));
        $path = asset('/storage/' . $path);
        //asset 拼接url

        $id = \Auth::id();
        User::where('id', $id)->update(['photo' => $path]);
        return back()->with('Ok');
    }

    public function show(User $user)
    {
        //依赖模型绑定 相关信息
        $user = User::withCount(['stars', 'fans', 'posts'])->find($user->id);

        //获取当前用户文章列表
        $posts = $user->posts()->orderby('created_at', 'desc')->take(10)->get();
//        dd($posts);
        //我的关注 关注者信息
        $stars = $user->stars;
        $susers = User::whereIn('id', $stars->pluck('star_id'))->withCount(['stars', 'fans', 'posts'])->get();

        //我的粉丝 粉丝信息
        $fans = $user->fans;
        $fusers = User::whereIn('id', $fans->pluck('fan_id'))->withCount(['stars', 'fans', 'posts'])->get();

        return view('User/show', compact(['user', 'posts', 'susers', 'fusers']));
    }

    //执行关注
    public function fan(User $user)
    {
        $me = \Auth::user();
        $me->doFan($user->id);
        return [
            'error' => 0,
            'msg' => ''
        ];
    }

    public function unfan(User $user)
    {
        $me = \Auth::user();
        $me->doUnFan($user->id);
        return [
            'error' => 0,
            'msg' => ''
        ];
    }
}
