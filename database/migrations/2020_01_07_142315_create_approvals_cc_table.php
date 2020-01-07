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
            $table->bigInteger('approval_id')->index()->comment('审批id');
            $table->integer('user_id')->comment('接收者');
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
        Schema::dropIfExists('approvals_cc');
    }
}
