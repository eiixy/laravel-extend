<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 任务资源
        Schema::create('tasks_resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('task_id')->index();
            $table->string('type')->comment('资源类型');
            $table->string('link')->comment('资源链接');
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
        Schema::dropIfExists('tasks_resources');
    }
}
