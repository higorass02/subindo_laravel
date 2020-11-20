<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitantesClientes extends Model
{
    protected $table = 'itens';
    protected $fillable = [
        '*'
    ];

    // public function abrangencia()
    // {
    //     return $this->belongsTo(Cardapios::class, 'id_cardapio', 'id');
    // }
}
