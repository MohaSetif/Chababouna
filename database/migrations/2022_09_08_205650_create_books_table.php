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
            $table->string('photo')->nullable();
            $table->string('copies')->nullable();
            $table->string('note')->nullable();
            $table->integer('parts')->nullable();
            $table->string('publication')->nullable();
            $table->string('documentation')->nullable();
            $table->string('review')->nullable();
            $table->string('writer_name')->nullable();
            $table->string('title')->nullable();
            $table->string('field')->nullable();
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
