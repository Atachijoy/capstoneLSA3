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
        Schema::create('producto_proveedor', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('id_producto');
            $table->string('rut_proveedor');

            $table->foreign('id_producto')
            ->references('id')
            ->on('producto');

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
        Schema::dropIfExists('producto_proveedor');
    }
};
