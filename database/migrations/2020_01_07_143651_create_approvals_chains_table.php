<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsChainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 审批链
        Schema::create('approvals_chains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('approval_id')->index()->comment('审批id');
            $table->unsignedInteger('user_id')->index()->comment('审批者');
            $table->string('comment')->comment('评论');
            $table->tinyInteger('status')->default(0)->comment('审批状态');
            $table->timestamps();

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
        Schema::dropIfExists('approvals_chains');
    }
}
