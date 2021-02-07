<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkeletonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Skeletons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('module_id')->unsigned();
            $table->string('type');
            $table->string('field');
            $table->string('length')->nullable();
            $table->boolean('nullable')->nullable();
            $table->string('default')->nullable();
            $table->string('rule1')->nullable();
            $table->string('rule2')->nullable();
            $table->string('rule3')->nullable();
            $table->string('rule4')->nullable();
            $table->string('rule5')->nullable();
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Skeletons');
    }
}
