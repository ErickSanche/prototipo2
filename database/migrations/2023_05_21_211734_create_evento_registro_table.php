<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoRegistroTable extends Migration
{
    public function up()
    {
        Schema::create('evento_registro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('registro_id');
            $table->timestamps();

            // Agregar las restricciones de clave foránea
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('registro_id')->references('id')->on('registros')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('evento_registro');
    }
}
