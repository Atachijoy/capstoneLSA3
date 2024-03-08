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
        Schema::create('proveedor', function (Blueprint $table) {

            $table->timestamps();
            $table->String('rut')->primary();
            $table->String('nombre_empresa')->nullable();
            $table->String('contacto')->nullable();
            $table->string('telefono')->nullable();
            $table->String('email')->nullable();
            $table->String('dirección')->nullable();
            $table->String('giro')->nullable();
            $table->string('fecha_evaluacion')->nullable();
            $table->integer('aprobacion')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor');
    }
};
