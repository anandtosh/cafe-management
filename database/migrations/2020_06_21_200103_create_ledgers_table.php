<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->string('contact')->nullable();
            $table->text('address');
            $table->string('bank_ac_no')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->string('bank_branch')->nullable();
            $table->bigInteger('group_id')->unsigned();
            $table->bigInteger('fiscal_id')->unsigned();
            $table->bigInteger('franchise_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('configs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fiscal_id')->references('id')->on('configs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('franchise_id')->references('id')->on('franchises')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ledgers');
    }
}
