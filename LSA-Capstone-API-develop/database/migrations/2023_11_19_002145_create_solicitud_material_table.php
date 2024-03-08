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
        Schema::create('solicitud_material', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('lote')->nullable();
            $table->string('fecha_vencimiento')->nullable();

            //claves foraneas
            $table->unsignedBigInteger('id_solicitud');

            $table->foreign('id_solicitud')->references('id')
            ->on('solicitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_material');
    }
};
