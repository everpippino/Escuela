<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrecioPagadoToServicioDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicio_detalle', function (Blueprint $table) {
            $table->float('precio_pagado')->default('0');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicio_detalle', function (Blueprint $table) {
            $table->dropColumn('precio_pagado');
        });
    }
}
