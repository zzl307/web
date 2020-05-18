<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            ],
            [
                'name'        => '鼻部整形',
                'description' => '眼部整形',
            ],
            [
                'name'        => '胸部整形',
                'description' => '眼部整形',
            ],
            [
                'name'        => '面部轮廓',
                'description' => '面部轮廓',
            ],
            [
                'name'        => '脂肪管理',
                'description' => '脂肪管理',
            ],
            [
                'name'        => '抗衰老',
                'description' => '抗衰老',
            ],
            [
                'name'        => '微整形',
                'description' => '微整形',
            ],
            [
                'name'        => '皮肤面容',
                'description' => '皮肤面容',
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
