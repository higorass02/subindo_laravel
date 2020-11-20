<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacaoPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacaos_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('id_cardapio');
            $table->foreign('id_cardapio')->references('id')->on('cardapios');
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
        Schema::dropIfExists('solicitacaos_pedidos');
    }
}
