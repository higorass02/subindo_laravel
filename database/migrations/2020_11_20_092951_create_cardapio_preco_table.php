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
        Schema::create('cardapios_precos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_cardapio');
            $table->double('preco_atual');
            $table->double('preco_anterior');
            $table->double('desconto_atual');
            $table->double('desconto_anterior');
            $table->string('status');
            $table->timestamps();
            $table->foreign('id_cardapio')->references('id')->on('cardapios');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardapios_precos');
    }
}
