<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 审批类型
        Schema::create('approvals_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('审批类型名称');
            $table->string('description')->comment('审批类型说明');
            $table->json('forms')->comment('审批表单');
            $table->json('process')->comment('审批流程');
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
        Schema::dropIfExists('approvals_types');
    }
}
