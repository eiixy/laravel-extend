<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 任务流程
        Schema::create('tasks_process', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('task_id')->comment('任务id');
            $table->string('process_type')->comment('流程类型');
            $table->integer('process_id')->comment('流程id');
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
        Schema::dropIfExists('tasks_process');
    }
}
