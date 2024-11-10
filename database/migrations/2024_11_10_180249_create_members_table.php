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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->enum('sex', ['male', 'female']);
            $table->string('job')->required();
            $table->date('birthdate')->required();
            $table->string('place')->required();
            $table->string('residence')->required();
            $table->string('hobby')->required();
            $table->string('help')->required();
            $table->string('email')->required();
            $table->string('photo')->required();
            $table->string('tel')->required();
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
        Schema::dropIfExists('members');
    }
};
