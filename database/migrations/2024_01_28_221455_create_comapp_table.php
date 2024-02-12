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
        Schema::create('comapp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comser_id');
            $table->foreign('comser_id')->references('id')->on('comser');
            $table->string('name');
            $table->string('comname');
            $table->string('email')->unique();
            $table->longText('description');
            $table->string('phone');
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
        Schema::dropIfExists('comapp');
    }
};
