<?php
/**
 * Created by PhpStorm.
 * User: hxsd
 * Date: 2018/9/3
 * Time: 15:55
 */

/*
 * Model 公共类
 *
 *
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model as BaseModel;//as 别名

class Model extends BaseModel
{
    protected $guarded = [];		//不可以注入的字段有哪些(设置为空数组代表不限制任何字段)
    //protected $fillable = ['title','content'];		//可以注入的字段有哪些
}
