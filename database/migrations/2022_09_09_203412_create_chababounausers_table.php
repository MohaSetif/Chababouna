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
        Schema::create('chababounausers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('sex');
            $table->string('job')->nullable();
            $table->string('DadJob')->nullable();
            $table->string('MomJob')->nullable();
            $table->integer('day')->nullable();
            $table->string('month')->nullable();
            $table->integer('year')->nullable();
            $table->string('place')->nullable();
            $table->string('residence')->nullable();;
            $table->string('hobby')->nullable();
            $table->string('help')->nullable();
            $table->string('email')->nullable();;
            $table->string('photo')->nullable();;
            $table->string('local')->nullable();
            $table->string('scholar_year')->nullable();
            $table->string('tel');
            $table->string('DadTel')->nullable();
            $table->string('inscripted_in')->nullable();
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
        Schema::dropIfExists('chababounausers');
    }
};
