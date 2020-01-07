<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 任务
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->comment('所属项目');
            $table->integer('pid')->default(0)->comment('父级项目编号');
            $table->integer('user_id')->comment('创建者');
            $table->string('title')->comment('任务名称');
            $table->text('content')->nullable()->comment('任务内容');
            $table->integer('executor')->nullable()->comment('执行者');
            $table->tinyInteger('priority')->default(50)->comment('任务优先级');
            $table->string('tags')->comment('任务标签');
            $table->dateTime('start_time')->nullable()->comment('任务开始时间');
            $table->dateTime('end_time')->nullable()->comment('任务结束时间');
            $table->tinyInteger('status')->default(0)->comment('任务状态');
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
        Schema::dropIfExists('tasks');
    }
}
