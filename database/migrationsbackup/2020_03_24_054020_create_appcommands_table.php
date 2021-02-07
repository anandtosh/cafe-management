<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppcommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appcommands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('command');
            $table->text('description')->nullable();
            $table->text('parameters')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appcommands');
    }
}
