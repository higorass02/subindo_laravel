<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitantesClientes extends Model
{
    protected $table = 'telefones_clientes';
    protected $fillable = [
        'id',
        'telefone1',
        'telefone2',
        'status',
        'id_solicitante_cliente'
    ];

    // public function abrangencia()
    // {
    //     return $this->belongsTo(Cardapios::class, 'id_cardapio', 'id');
    // }
}
