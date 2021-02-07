<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('applied_on');
            $table->date('resolved_on')->nullable();
            $table->string('current_status')->nullable();
            $table->text('description');
            $table->string('uploads')->nullable();
            $table->integer('amount');
            $table->bigInteger('franchise_id')->unsigned();
            $table->bigInteger('fiscal_id')->unsigned();
            $table->bigInteger('requestwork_id')->unsigned();
            $table->foreign('franchise_id')->references('id')->on('franchises')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fiscal_id')->references('id')->on('configs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('requestwork_id')->references('id')->on('requestworks')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
