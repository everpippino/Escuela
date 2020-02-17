<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matricula_id');
            $table->integer('servicio_id');
            $table->date('fecha_alta');
            $table->date('fecha_baja');
            $table->date('fecha_vto');
            $table->enum('estado',['pagada','vigente','vencida']);
            $table->float('precio_actual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio_detalle');
    }
}
