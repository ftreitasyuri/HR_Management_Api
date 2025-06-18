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
        Schema::create('dependentes', function (Blueprint $table) {
            $table->id('id_dependente');
            $table->foreignId('funcionario_id')->constrained('funcionarios')->onDelete('cascade');
            $table->string('nome_depen')->nullable();
            $table->string('dep_cpf')->nullable();
            $table->string('dep_arquivo_rg_frente')->nullable();
            $table->string('dep_arquivo_rg_verso')->nullable();           
            $table->string('dep_arquivo_cert_nasc')->nullable();
            $table->string('dep_arquivo_sus')->nullable();
            $table->string('dep_arquivo_freq_escolar')->nullable();
            $table->string('dep_arquivo_vacinacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependentes');
    }
};
