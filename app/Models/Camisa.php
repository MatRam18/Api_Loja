<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camisa extends Model
{
    protected $fillable = [
        'marca',
        'cor',
        'tipo',
        'tamanho',
    ];
}
