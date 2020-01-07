<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksDynamicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 任务动态
        Schema::create('tasks_dynamics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('task_id')->index()->comment('任务id');
            $table->string('operation')->comment('操作');
            $table->json('data')->nullable()->comment('数据');
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
        Schema::dropIfExists('tasks_dynamics');
    }
}
