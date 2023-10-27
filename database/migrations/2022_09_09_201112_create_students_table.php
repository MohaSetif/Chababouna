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
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('sex');
            $table->string('job');
            $table->string('DadJob')->nullable();
            $table->string('MomJob')->nullable();
            $table->integer('day');
            $table->integer('month');
            $table->integer('year');
            $table->string('place');
            $table->string('residence');
            $table->string('photo');
            $table->string('email');
            $table->string('local')->nullable();
            $table->string('inscripted_in')->default('التعليم-القرآني');
            $table->string('scholar_year');
            $table->string('tel');
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
        Schema::dropIfExists('students');
    }
};
