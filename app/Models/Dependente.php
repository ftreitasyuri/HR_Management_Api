<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    /** @use HasFactory<\Database\Factories\DependenteFactory> */
    use HasFactory;
    protected $primaryKey = 'id_dependente';

    protected $fillable = [
        'funcionario_id',
        'nome_depen',
        'dep_cpf',
        
        'dep_arquivo_rg_frente',
        'dep_arquivo_rg_verso',
        'dep_arquivo_sus',
        'dep_arquivo_cert_nasc',
        'dep_arquivo_freq_escolar',
        'dep_arquivo_vacinacao'
        
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
