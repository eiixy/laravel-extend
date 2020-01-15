<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 审批
        Schema::create('approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('type')->comment('审批类型');
            $table->unsignedInteger('user_id')->index()->comment('发起者');
            $table->json('form_data')->comment('表单数据');
            $table->tinyInteger('status')->default(0)->comment('状态');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type')->references('id')->on('approvals_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvals');
    }
}
