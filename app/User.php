<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //关联Fan模型
    //关注了什么用户
    public function stars(){
        return $this->hasMany('App\Model\Fan','fan_id','id');
    }
    //获取粉丝列表
    public function fans(){
        return $this->hasMany('App\Model\Fan','star_id','id');
    }
    //获取当前用户所有文章列表
    public function posts(){
        return $this->hasMany('App\Model\Post','user_id','id');
    }
    //判断当前用户 被$uid关注？
    public function hasStar($uid){
        return $this->stars()->where('star_id',$uid)->count();
    }
    //判断当前用户 关注了$uid？
    public function hasFan($uid){
        return $this->fans()->where('fan_id',$uid)->count();
    }
    //关注$uid？
    public function doFan($uid){
        $fan=new \App\Model\Fan();
        $fan->star_id=$uid;

        return $this->stars()->save($fan);
    }
    //取消关注
    public function doUnFan($uid){
        $fan=new \App\Model\Fan();
        $fan->star_id=$uid;

        return $this->stars()->delete($fan);
    }
}
