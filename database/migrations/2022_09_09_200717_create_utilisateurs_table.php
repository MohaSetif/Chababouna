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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('sex');
            $table->string('job')->nullable();
            $table->string('DadJob')->nullable();
            $table->string('MomJob')->nullable();
            $table->integer('day');
            $table->string('month');
            $table->integer('year');
            $table->string('place');
            $table->string('residence');
            $table->string('hobby');
            $table->string('help');
            $table->string('email');
            $table->string('inscripted_in')->default('الانخراط');
            $table->string('photo');
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
        Schema::dropIfExists('utilisateurs');
    }
};
