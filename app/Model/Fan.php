<?php

namespace App\Model;

use App\Model\Model;

class Fan extends Model {
	//粉丝用户
	public function fuser() {
		$this -> hasOne('App\User', 'id', 'fan_id');
	}

	//被关注者用户信息
	public function suser() {
		$this -> hasOne('App\User', 'id', 'star_id');
	}

}
