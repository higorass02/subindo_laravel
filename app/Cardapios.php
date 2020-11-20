<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardapios extends Model
{
    protected $table = 'cardapios';
    protected $fillable = [
        'id',
        'nome_op',
        'desc',
        'status'
    ];

    public function abrangencia()
    {
        return $this->belongsTo(Cardapios::class, 'id_cardapio', 'id');
    }
}
