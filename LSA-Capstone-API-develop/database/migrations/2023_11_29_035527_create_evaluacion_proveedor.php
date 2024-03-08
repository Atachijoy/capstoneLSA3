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
        Schema::create('evaluacion_proveedor', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //c1 significa campo 1, el cual corresponde 
            //a la pregunta 1 del apartado calidad de servicios
            $table->boolean('calidad_c1')->nullable();
            $table->boolean('calidad_c2')->nullable();
            $table->boolean('calidad_c3')->nullable();
            $table->boolean('calidad_c4')->nullable();
            $table->boolean('calidad_c5')->nullable();
            $table->boolean('calidad_c6')->nullable();
            $table->boolean('calidad_c7')->nullable();
            $table->boolean('calidad_c8')->nullable();

            $table->boolean('cumplimiento_cantidad_c1')->nullable();

            $table->boolean('cumplimiento_tiempo_c1')->nullable();

            $table->boolean('servicio_postventa_c1')->nullable();
            $table->boolean('servicio_postventa_c2')->nullable();

            $table->string('valor_total_calidad')->nullable();
            $table->string('valor_total_cumplimiento_cantidad')->nullable();
            $table->string('valor_total_cumplimiento_tiempo')->nullable();
            $table->string('valor_total_servicio_postventa')->nullable();
            $table->string('valor_asignado')->nullable();

            $table->string('observaciones')->nullable();
            $table->string('fecha_evaluacion')->nullable();

            //claves foraneas
            $table->string('rut_proveedor');
            $table->string('rut_empleado');

            $table->foreign('rut_proveedor')->references('rut')
            ->on('proveedor')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('rut_empleado')->references('rut_empleado')
            ->on('empleado')
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
        Schema::dropIfExists('evaluacion_proveedor');
    }
};
