<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //模型工厂 填充数据库
        factory(\App\Model\Post::class,100)->create();
    }
}
