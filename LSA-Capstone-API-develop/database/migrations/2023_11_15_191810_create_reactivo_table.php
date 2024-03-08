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
        Schema::create('reactivo', function (Blueprint $table) {

            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('formula');
            $table->string('peligrosidad');
            $table->integer('clase');
            $table->integer('riesgo_secundario');
            $table->integer('grupo_embalaje');
            $table->integer('disposiciones');
            $table->integer('n_guia');

            //clave foranea
            $table->unsignedBigInteger('id_producto');


            $table->foreign('id_producto')->references('id')
            ->on('producto')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reactivo');
    }
};
