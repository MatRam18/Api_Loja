<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calcados extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'tipo',
        'tamanho',
    ];
}
