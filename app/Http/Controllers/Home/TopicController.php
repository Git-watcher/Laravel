<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Topic;
use App\Model\Post;
use App\Model\PostTopic;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        //专题文章数
        $topic = Topic::withCount('postTopics')->find($topic->id);

        //专题文章列表
        $posts = $topic->posts()->orderby('created_at', 'desc')->take(10)->get();
        //获取文章 且未归类专题
//        $myposts = Post::authorBy(\Auth::id())->topicNotBy($topic->id)->get();
        $myposts = Post::authorBy(\Auth::id())->doesntHave('postTopics')->get();
        return view('/topic/show', compact(['topic', 'posts', 'myposts']));
    }

    //执行文章投稿 归入专题
    public function submit(Topic $topic)
    {
        $this->validate(request(), [
            'post_ids' => 'required|array'
        ]);
//        dd(request('post_ids'));
        $post_ids = request('post_ids');
        $topic_id = $topic->id;

        foreach ($post_ids as $post_id) {
            PostTopic::firstorcreate(compact(['post_id', 'topic_id']));
        }
        return back()->with('success', '投稿成功');
    }
}
