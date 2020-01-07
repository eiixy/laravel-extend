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
            $table->string('type')->comment('审批类型');
            $table->integer('user_id')->index()->comment('发起者');
            $table->integer('approval_user_id')->index()->comment('审批者');
            $table->text('content')->comment('审批说明');
            $table->text('data')->comment('关联数据');
            $table->tinyInteger('status')->default(0)->comment('状态');
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
        Schema::dropIfExists('approvals');
    }
}
