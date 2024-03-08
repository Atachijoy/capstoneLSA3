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
        Schema::create('solicitud_producto', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('fecha_vencimiento')->nullable();

            //claves foraneas
            $table->unsignedBigInteger('id_solicitud');

            $table->foreign('id_solicitud')
            ->references('id')
            ->on('solicitud')
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
        Schema::dropIfExists('solicitud_producto');
    }
};
