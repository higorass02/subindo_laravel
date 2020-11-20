<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitantesClientes extends Model
{
    protected $table = 'solicitantes_clientes';
    protected $fillable = [
        'id',
        'nome',
        'dt_nasc',
        'sexo',
        'email',
        'status'
    ];

    // public function abrangencia()
    // {
    //     return $this->belongsTo(Cardapios::class, 'id_cardapio', 'id');
    // }
}
