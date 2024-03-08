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
        Schema::create('field_form', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('field_id');

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');

            $table->string('Valor')->nullable();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_form');
    }
};
