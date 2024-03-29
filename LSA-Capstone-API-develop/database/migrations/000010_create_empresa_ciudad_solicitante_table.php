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
        Schema::create('empresa_ciudad_solicitante', function (Blueprint $table) {

            $table->string('rut_empresa', 255);

            $table->unsignedBigInteger('id_ciudad');

            $table->string('rut_solicitante', 255);

            $table->foreign('rut_empresa')->references('rut_empresa')->on('Empresa')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('id_ciudad')->references('id_ciudad')->on('Ciudad')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('rut_solicitante')->references('rut_solicitante')->on('Solicitante')
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
      #  Schema::dropIfExists('empresa_ciudad_solicitante');
    }
};
