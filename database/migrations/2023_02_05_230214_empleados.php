<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers',function(Blueprint $table){
            $table->increments('id')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('number');
            $table->integer('age');
            $table->string('profession');
            $table->integer('years');
            $table->integer('salary');
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
        //
    }
};
