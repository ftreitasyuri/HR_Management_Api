<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo')->nullable();
            $table->string('email')->nullable();
            $table->string('nome_social')->nullable();
            $table->date('data_nasc')->nullable();
            $table->string('genero')->nullable();
            $table->string('tel_contato')->nullable();
            $table->string('tel_emergencia')->nullable();
            $table->string('autodeclaracao')->nullable();
            $table->string('foto_perfil')->nullable();
            $table->string('rg_numero')->nullable();
            $table->string('rg_frente')->nullable();
            $table->string('rg_verso')->nullable();
            $table->string('cpf_numero')->nullable();
            $table->string('cpf_foto')->nullable();
            $table->string('titulo_num')->nullable();
            $table->string('titulo_zona')->nullable();
            $table->string('titulo_secao')->nullable();
            $table->string('titulo_comprovante')->nullable();
            $table->string('pis_nit')->nullable();
            $table->string('comp_pis')->nullable();
            $table->string('ctps_frente')->nullable();
            $table->string('end_rua')->nullable();
            $table->string('end_num')->nullable();
            $table->string('end_complemento')->nullable();
            $table->string('end_bairro')->nullable();
            $table->string('end_municipio')->nullable();
            $table->string('end_cep')->nullable();
            $table->string('comprov_resid')->nullable();
            $table->string('formacao')->nullable();
            $table->string('cert_formacao')->nullable();
            $table->string('sus_num')->nullable();
            $table->string('sus_foto')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('reg_civil')->nullable();
            $table->string('tem_reservista')->nullable();
            $table->string('reservista_num')->nullable();
            $table->string('reservista_frente')->nullable();
            $table->string('reservista_verso')->nullable();
            $table->string('nome_mae')->nullable();
            $table->date('nasc_mae')->nullable();
            $table->string('nome_pai')->nullable();
            $table->string('print_cpf_consulta')->nullable();
            $table->string('tem_conta_santander')->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();
            $table->string('comprovante_conta')->nullable();
            $table->string('tem_dependentes')->nullable();
            $table->string('cargo')->nullable();
            $table->string('area_atuacao')->nullable();
            $table->string('nome_lider')->nullable();
            $table->string('situacao')->nullable();
            // Adicionar um campo de Ativo sim/nao
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
