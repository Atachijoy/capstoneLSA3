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
        Schema::create('solicitud_empleado', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('id_solicitud');
            $table->string('rut_empleado');

            $table->foreign('id_solicitud')
            ->references('id')
            ->on('solicitud')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('rut_empleado')
            ->references('rut_empleado')
            ->on('empleado')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_empleado');
    }
};
