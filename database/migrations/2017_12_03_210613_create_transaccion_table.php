<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion', function (Blueprint $table) {
            $table->integer('secuencia');
            $table->string('nodo');
            $table->date('fecha_transaccion');
            $table->string('codigo_iso');
            $table->time('hora');
            $table->string('codigo_respuesta');
            $table->decimal('monto_transaccion', 10, 2);
            $table->primary('secuencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaccion');
    }
}
