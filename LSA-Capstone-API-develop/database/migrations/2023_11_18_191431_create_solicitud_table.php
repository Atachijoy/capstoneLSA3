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
        Schema::create('solicitud', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('area')->nullable();
            $table->string('unidad')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('procedimiento')->nullable();
            $table->string('fecha_solicitud')->nullable();
            $table->string('validacion')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud');
    }
};
