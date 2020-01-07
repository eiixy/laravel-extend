<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormConfiguresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 表单配置
        Schema::create('form_configures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keyword')->comment('表单标识');
            $table->string('name')->comment('表单名称');
            $table->json('rules')->comment('表单规则');
            $table->integer('sort')->default(1000)->comment('排序');
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
        Schema::dropIfExists('form_configures');
    }
}
