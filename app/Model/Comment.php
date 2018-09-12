<?php

namespace App\Model;

use App\Model\Model;

class Comment extends Model {
	public function post() {
		//定义与posts反向关联关系
		return $this -> belongsTo('App\Model\Post');
	}

	public function user() {
		//一对多 反向
		return $this -> belongsTo('App\User');
	}

}
