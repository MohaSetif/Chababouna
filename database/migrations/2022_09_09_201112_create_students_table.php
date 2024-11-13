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
            $table->string('name')->required();
            $table->string('surname')->required();
            $table->enum('sex', ['male', 'female']);
            $table->string('job')->nullable();
            $table->date('birthdate')->required();
            $table->string('dad_job')->nullable();
            $table->string('mom_job')->nullable();
            $table->string('place')->required();
            $table->string('residence')->required();
            $table->string('photo')->required();
            $table->string('email')->required();
            $table->string('scholar_year')->required();
            $table->string('tel')->required();
            $table->string('study_local')->nullable();
            $table->string('dad_tel')->required();
            $table->string('status')->default('pending');
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
