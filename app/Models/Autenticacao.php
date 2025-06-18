<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autenticacao extends Model
{
    //

    protected $table = 'autenticacao';

    protected $fillable = [
        'nome',
        'email',
        'token_funcionario'

    ];
}
