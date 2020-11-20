<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitantesClientes extends Model
{
    protected $table = 'itens_pedidos';
    protected $fillable = [
        '*'
    ];

    // public function abrangencia()
    // {
    //     return $this->belongsTo(Cardapios::class, 'id_cardapio', 'id');
    // }
}
