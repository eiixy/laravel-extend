<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 用户关联组织架构
        Schema::create('users_organizations', function (Blueprint $table) {
            $table->integer('user_id')->comment('用户编号');
            $table->integer('organization_id')->comment('组织架构编号');
            $table->string('position')->nullable()->comment('职位');
            $table->tinyInteger('is_admin')->default(0)->comment('是否为管理员');
            $table->unique(['organization_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_organizations');
    }
}
