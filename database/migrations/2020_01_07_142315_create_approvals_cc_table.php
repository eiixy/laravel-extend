<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsCcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 审批抄送
        Schema::create('approvals_cc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('approval_id')->comment('审批id');
            $table->unsignedInteger('user_id')->index()->comment('接收者');
            $table->timestamps();

            $table->unique(['approval_id','user_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('approval_id')->references('id')->on('approvals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvals_cc');
    }
}
