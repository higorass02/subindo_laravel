<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardapios extends Model
{
    protected $fillable = [
        'id',
        'nome_op',
        'desc',
        'status'
    ];
}
