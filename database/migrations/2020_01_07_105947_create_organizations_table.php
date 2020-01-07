<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 组织架构
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(0)->comment('父级ID');
            $table->string('name')->comment('名称');
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
        Schema::dropIfExists('organizations');
    }
}
