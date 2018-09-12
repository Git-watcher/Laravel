<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//前台路由
Route::prefix('/')->namespace('Home')->group(function () {
    //
    Route::get('/', 'IndexController@index');

    Route::get('error', 'ErrorController@index');
    //加载专题页面
    Route::get('/topic/{topic}', 'TopicController@show');
    //执行文章投稿 归入专题
    Route::post('/topic/{topic}/submit', 'TopicController@submit');

    //reg  //login //user个人中心
    Route::get('register', 'RegisterController@index');
    Route::post('register', 'RegisterController@register');

    //login
    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');

    //user个人设置setting
    Route::get('user/{id}/setting', 'UserController@setting');
    Route::post('user/{id}/setting', 'UserController@settingstore');
    //个人中心
    Route::get('user/{user}/show', 'UserController@show');
    Route::get('user/{user}/fan', 'UserController@fan');
    Route::get('user/{user}/unfan', 'UserController@unfan');

    //执行评论
    Route::post('/posts/{post}/comment', 'PostController@comment');
    //赞
    Route::get('/posts/{post}/zan', 'PostController@zan');
    Route::get('/posts/{post}/unzan', 'PostController@unzan');
    //article
    Route::resource('/posts', 'PostController');
});