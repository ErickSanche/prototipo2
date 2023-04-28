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
        Schema::create('paquete_servicio', function (Blueprint $table) {
            $table->unsignedBigInteger('paquete_id');
            $table->unsignedBigInteger('servicio_id');
            $table->timestamps();

            $table->foreign('paquete_id')->references('id')->on('grupopaquetes')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');

            $table->primary(['paquete_id', 'servicio_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete_servicio');
    }
};
