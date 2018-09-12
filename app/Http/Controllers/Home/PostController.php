<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Comment;
use App\Model\Zans;

class PostController extends Controller
{
    public function index()
    {
        //withCount('comments') 依赖模型关联 统计评论数 点赞数
        $posts = Post::orderby('created_at', 'desc')->withCount(['comments', 'zans'])->paginate(7);
        //渲染
        return view('post/index', compact('posts', 'News'));
    }

    public function create()
    {
        //加载发布页面
        return view('post/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);
        //create 需要在Post类中允许字段注入
        //详见 Model protected $guarded = [];

        //获取id
        $user_id = \Auth::id();
        //request获取title和content 拼接数组
        $param = array_merge(request(['title', 'content']), compact('user_id'));
        Post::create($param);
        return redirect('/posts');
    }

    public function show(Post $post)
    {
        //详情页面
//        $post =Post::find($id);
        return view('post/show', compact('post'));
    }

    public function edit(Post $post)
    {
        //实际上Post $post 获取当前$post完整数据
        return view('post/edit', compact('post'));
    }

    public function update(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        //让策略类生效
        $this->authorize('update', $post);

        //模型更新数据素质四联
        $post = Post::find($post->id);
        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        return redirect('/posts/' . $post->id)->with('success', 'Congratulations！');
    }

    public function destroy(Post $post)
    {
        //让策略类生效
        $this->authorize('destroy', $post);
        $Rows = Post::where('id', $post->id)->delete();
        echo $Rows;
    }

    //文章评论
    public function comment(Post $post)
    {
        //验证
        $this->validate(request(), [
            'content' => 'required|min:15'
        ]);

        //逻辑
        $comment = new Comment();
        //获取id
//        dd($post->id);
        $comment->post_id = $post->id;
        $comment->user_id = \Auth::id();
        $comment->content = request('content');
        //将拼装信息存储 依赖模型关联
        $comment->save();

        return back()->with("success", "评论ok");
    }

    public function zan(Post $post)
    {
        $param = [
            'user_id' => \Auth::id(),
            'post_id' => $post->id
        ];
        Zans::create($param);
        return back()->with("success", "赞！");
    }

    public function unzan(Post $post)
    {
        //$post发起模型关联在于$post 可以将post_id 传递 无需再分辨哪篇文章
        $post->zan(\Auth::id())->delete();
        return back()->with("success", "取消赞啦！");
    }
}
