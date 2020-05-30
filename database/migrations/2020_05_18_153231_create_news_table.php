<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->index()->comment('标题');
            $table->string('keyword')->index()->comment('关键词');
            $table->text('description')->nullable()->comment('描述');
            $table->integer('cid')->comment('新闻分类id');
            $table->string('status')->comment('新闻发布状态');
            $table->integer('post_count')->comment('新闻阅读数');
            $table->string('avatar')->comment('新闻封面');
            $table->string('slug')->comment('新闻封面');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
