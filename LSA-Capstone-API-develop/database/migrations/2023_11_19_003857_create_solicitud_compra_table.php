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
        Schema::create('solicitud_compra', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('especificaciones')->nullable();
            $table->string('estado')->nullable();

            //claves foraneas
            $table->unsignedBigInteger('id_solicitud');
            $table->string('rut_proveedor');

            $table->foreign('id_solicitud')
            ->references('id')
            ->on('solicitud')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('rut_proveedor')
            ->references('rut')
            ->on('proveedor')
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
        Schema::dropIfExists('solicitud_compra');
    }
};
