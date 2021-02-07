<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreUserTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('primary_contact')->after('email')->nullable();
            $table->string('alternate_contact')->after('email')->nullable();
            $table->text('address')->after('email')->nullable();
            $table->bigInteger('franchise_id')->unsigned()->nullable();
            $table->foreign('franchise_id')->references('id')->on('franchises')->onDelete('cascade')->onUpdate('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('primary_contact');
            $table->dropColumn('alternate_contact');
            $table->dropColumn('address');
            $table->dropColumn('franchise_id');
        });
    }
}
