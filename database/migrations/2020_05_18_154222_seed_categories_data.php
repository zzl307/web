<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '眼部整形',
                'description' => '眼部整形',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '鼻部整形',
                'description' => '鼻部整形',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '胸部整形',
                'description' => '胸部整形',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '面部轮廓',
                'description' => '面部轮廓',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '脂肪管理',
                'description' => '脂肪管理',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '抗衰老',
                'description' => '抗衰老',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '微整形',
                'description' => '微整形',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '皮肤面容',
                'description' => '皮肤面容',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '在线客服',
                'description' => '在线客服',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '联系我们',
                'description' => '联系我们',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '新闻资讯',
                'description' => '新闻资讯',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '企业文化',
                'description' => '企业文化',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '案例展示',
                'description' => '案例展示',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
            [
                'name'        => '培训技术',
                'description' => '培训技术',
                'cid'         => 0,
                'status'      => 1,
                'post_count'  => 0,
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
