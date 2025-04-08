<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calcado extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'tipo',
        'tamanho',
    ];
}
