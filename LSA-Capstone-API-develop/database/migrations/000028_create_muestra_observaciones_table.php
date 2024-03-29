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
        Schema::create('muestra_observaciones', function (Blueprint $table) {

            $table->unsignedBigInteger('RUM');

            $table->string('rut_empleado', 255);

            $table->string('observaciones', 512)
                  ->nullable();

            $table->date('fecha_observacion')
                  ->nullable();

            $table->time('hora_observacion')
                  ->nullable();

            $table->foreign('RUM')->references('RUM')->on('Muestra')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('rut_empleado')->references('rut_empleado')->on('Empleado')
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
    #    Schema::dropIfExists('muestra_observaciones');
    }
};
