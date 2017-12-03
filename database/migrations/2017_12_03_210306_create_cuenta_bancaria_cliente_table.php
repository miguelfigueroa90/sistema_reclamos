<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaBancariaClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuente_bancaria_cliente', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string('cedula');
            $table->integer('codigo_cuenta_bancaria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuente_bancaria_cliente');
    }
}
