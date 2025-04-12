<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camisas extends Model
{
    protected $fillable = [
        'marca',
        'cor',
        'tipo',
        'tamanho',
    ];
}
