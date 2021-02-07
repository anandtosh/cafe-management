<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('modelpath')->nullable();
            $table->string('controller')->nullable();
            $table->string('controllerpath')->nullable();
            $table->string('views')->nullable();
            $table->string('viewspath')->nullable();
            $table->string('migration')->nullable();
            $table->string('menu')->nullable();
            $table->string('softdelete')->nullable();
            $table->string('routes')->nullable();
            $table->string('routegroup')->nullable();
            $table->string('primary')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modules');
    }
}
