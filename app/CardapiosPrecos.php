<?php

namespace App;

use App\Cardapios;
use Illuminate\Database\Eloquent\Model;

class CardapiosPrecos extends Model
{
    protected $table = 'cardapios_precos';

    protected $fillable = [
        'id',
        'id_cardapio',
        'preco_atual',
        'preco_anterior',
        'desconto_atual',
        'desconto_anterior',
        'status'
    ];

    public function cardapios() {
        return $this->hasMany(Cardapios::Class,'id_cardapio','id');
    }
}
