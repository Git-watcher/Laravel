<?php

namespace App\Model;

use App\Model\Model;

class Topic extends Model
{
    public function posts()
    {
        //获取专题下文章
        return $this->belongsToMany('App\Model\Post', 'post_topics', 'topic_id', 'post_id')->withDefault();
    }

    public function postTopics()
    {
        return $this->hasMany('App\Model\PostTopic', 'topic_id', 'id');
    }

}
