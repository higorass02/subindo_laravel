<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitantesClientes extends Model
{
    protected $table = 'solicitantes_clientes';
    protected $fillable = [
        'id',
        'numero',
        'bairro',
        'cep',
        'tipo',
        'status',
        'id_solicitante_cliente',
    ];

    // public function abrangencia()
    // {
    //     return $this->belongsTo(Cardapios::class, 'id_cardapio', 'id');
    // }
}
