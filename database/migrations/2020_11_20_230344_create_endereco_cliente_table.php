<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos_clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->string('tipo');
            $table->string('status');
            $table->string('id_solicitante_cliente');
            $table->foreign('id_solicitante_cliente')->references('id')->on('solicitantes_clientes');
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
        Schema::dropIfExists('enderecos_clientes');
    }
}
