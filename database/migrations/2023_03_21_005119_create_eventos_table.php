<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */public function up()
{
    Schema::create('eventos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->date('fecha');
        $table->time('hora_inicio');
        $table->time('hora_fin');
        $table->unsignedInteger('numero_invitados')->nullable(false);
        $table->foreignId('grupopaquete_id')->constrained('grupopaquetes')->onDelete('cascade');
        $table->string('imagen')->nullable()->default(null);
        $table->string('estado')->default('No confirmado');
        $table->foreignId('registro_id')->constrained('registros')->onDelete('cascade');
        $table->timestamps();
        //se creo nueva llave foranea
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
