<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsDynamicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 项目动态
        Schema::create('projects_dynamics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->index()->comment('项目id');
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
        Schema::dropIfExists('projects_dynamics');
    }
}
