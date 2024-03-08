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
        Schema::create('producto', function (Blueprint $table) {

            $table->id()->autoIncrement();
            $table->string('codigo')->nullable();
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('marca')->nullable();
            $table->integer('ingresos')->nullable();
            $table->integer('egresos')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('lote')->nullable();

            //clave externa
            $table->string('rut_proveedor');

            $table->foreign('rut_proveedor')
                ->references('rut')
                ->on('proveedor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
};
