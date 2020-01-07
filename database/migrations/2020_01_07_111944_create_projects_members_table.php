<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 项目成员
        Schema::create('projects_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->comment('项目编号');
            $table->integer('user_id')->index()->comment('用户编号');
            $table->tinyInteger('type')->default(0)->comment('用户类型');
            $table->unique(['project_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_members');
    }
}
