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
        Schema::create('empleado_formulario_muestra', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger("form_id");
            $table->unsignedBigInteger("RUM_muestra");
            $table->string("rut_empleado");


            $table->foreign('RUM_muestra')->references('RUM')->on('muestra')->onDelete('cascade');
            $table->foreign("rut_empleado")->references('rut_empleado')->on('empleado')->onDelete('cascade');
            $table->foreign("form_id")->references("id")->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_formulario_muestra');
    }
};
