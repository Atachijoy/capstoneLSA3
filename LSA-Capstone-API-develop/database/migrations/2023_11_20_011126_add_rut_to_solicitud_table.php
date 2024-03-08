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
        Schema::table('solicitud_empleado', function (Blueprint $table) {
            $table->string('rut_empleado');

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
        Schema::table('solicitud_empleado', function (Blueprint $table) {
            //
        });
    }
};
