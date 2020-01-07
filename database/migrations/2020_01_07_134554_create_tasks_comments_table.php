<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 任务评论
        Schema::create('tasks_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pid')->default(0)->comment('父评论');
            $table->bigInteger('task_id')->index()->comment('任务id');
            $table->integer('user_id')->index()->comment('创建者');
            $table->integer('reply_to')->nullable()->comment('答复某人');
            $table->string('content')->comment('内容');
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
        Schema::dropIfExists('tasks_comments');
    }
}
