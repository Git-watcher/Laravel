<?php

namespace App\Model;

use App\Model\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    //继承了公共类Model 无需 protected $guarded = [];

    //定义用户关联
    public function user()
    {
        //一对多 反向
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function comments()
    {
        //一对多
        return $this->hasMany('App\Model\Comment')->orderby('created_at', 'desc');
        //related : App\Model\Comment::class
    }

    //定义点赞表 一对一
    public function zan($user_id)
    {
        return $this->hasOne('App\Model\Zans')->where('user_id', $user_id);
    }

    public function zans()
    {
        //一对多 获取一篇文章所有赞
        return $this->hasMany('App\Model\Zans');
    }

    //获取某作者所有文章
    public function scopeAuthorBy(Builder $query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    //获取文章专题
    public function postTopics()
    {
        return $this->hasOne('App\Model\PostTopic', 'post_id', 'id');
    }

    //不属于当前专题文章
    public function scopeTopicNotBy(Builder $query, $topic_id)
    {
        return $query->doesntHave('postTopics', 'and', function ($query) use ($topic_id) {
            $query->where('topic_id', $topic_id);
        });
    }

    //当前文章所属专题
    public function topic()
    {
        return $this->belongsToMany('App\Model\Topic', 'post_topics', 'post_id', 'topic_id');
    }

}
