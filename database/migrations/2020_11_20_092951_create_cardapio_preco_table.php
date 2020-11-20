<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardapioPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapio_preco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cardapio');
            $table->double('preco_atual');
            $table->double('preco_anterior');
            $table->double('desconto_atual');
            $table->double('desconto_anterior');
            $table->bool('status');
            $table->timestamps();
        });
        $table->foreign('id_cardapio')->references('id')->on('cardapios')->onDelete('cascade');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardapio_preco');
    }
}
