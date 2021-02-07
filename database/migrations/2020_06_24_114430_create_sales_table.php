<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('qty');
            $table->float('rate');
            $table->float('bank_fee')->nullable();
            $table->float('bank_fee_extra_charge')->nullable();
            $table->float('total');
            $table->float('receivable');
            $table->bigInteger('fiscal_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('franchise_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('work_id')->unsigned();
            $table->foreign('fiscal_id')->references('id')->on('configs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('franchise_id')->references('id')->on('franchises')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('ledgers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales');
    }
}
