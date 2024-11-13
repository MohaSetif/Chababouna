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
        Schema::create('books', function (Blueprint $table) {
            $table->timestamps();
            $table->string('photo');
            $table->string('copies');
            $table->string('note');
            $table->integer('parts');
            $table->string('publication');
            $table->string('documentation');
            $table->string('review');
            $table->string('writer_name');
            $table->string('title');
            $table->string('field');
            $table->increments('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
