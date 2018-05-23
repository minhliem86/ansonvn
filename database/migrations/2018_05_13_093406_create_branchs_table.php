<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('opentime')->nullable();
            $table->string('hotline')->nullable();
            $table->string('img_url')->nullable();
            $table->string('map')->nullable();
            $table->boolean('status')->default(1);
            $table->tinyInteger('order')->default(1);

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
        Schema::drop('branchs');
    }
}
