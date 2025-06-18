<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    /** @use HasFactory<\Database\Factories\FuncionarioFactory> */
    use HasFactory;
    protected $fillable = [
        'nome_completo',
        'email',
        'nome_social',
        'data_nasc',
        'genero',
        'tel_contato',
        'tel_emergencia',
        'autodeclaracao',
        'foto_perfil',
        'rg_numero',
        'cpf_numero',
        'titulo_num',
        'titulo_zona',
        'titulo_secao',
        'pis_nit',
        'end_rua',
        'end_num',
        'end_complemento',
        'end_bairro',
        'end_municipio',
        'end_cep',
        'formacao',
        'sus_num',
        'estado_civil',
        'reg_civil',
        'tem_reservista',
        'reservista_num',
        'nome_mae',
        'nasc_mae',
        'nome_pai',
        'print_cpf_consulta',
        'tem_conta_santander',
        'agencia',
        'conta',
        'foto_perfil',
        'rg_frente',
        'rg_verso',
        'cpf_foto',
        'titulo_comprovante',
        'comp_pis',
        'ctps_frente',
        'comprov_resid',
        'cert_formacao',
        'sus_foto',
        'reservista_frente',
        'reservista_verso',
        'print_cpf_consulta',
        'comprovante_conta',
        'tem_dependentes',
        'dep_rg_frente',
        'dep_rg_verso',
        'dep_cert_nasc',
        'dep_cart_sus',
        'dep_freq_escolar',
        'dep_cart_vacina',
        'cargo',
        'area_atuacao',
        'nome_lider',
        'situacao'

    ];

    public function dependentes()
    {
        return $this->hasMany(Dependente::class);
    }
}
    