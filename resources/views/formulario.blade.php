<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Completo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<?php
// Área para código PHP
?>

<body>
    {{-- AREA NAVBAR --}}


    <!-- Como um span -->
    <nav class="navbar p-2 container-fluid bg-primary d-flex justify-content-between">
            <div class="">
                <a class="navbar-brand text-light fs-2" href="#">S.M.T.E</a>
            </div>
            <div class="">
                <a class="navbar-brand text-light"  target="_blank" href="https://www.google.com">Consultar CPF</a>
                <a class="navbar-brand text-light"  target="_blank" href="#">Consultar PIS</a>
                <a class="navbar-brand text-light"  target="_blank" href="#">Consultar A. Criminal</a>
                   
            </div>
        

    </nav>
    {{-- FIM AREA NAVBAR --}}


    <div class="container mt-4 mb-4">
        <h2 class="mb-4">Formulário Funcionário </h2>
        <!-- Exibe mensagens de erro gerais -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erros encontrados no formulário:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('criando_func') }}" enctype="multipart/form-data">
            @csrf
            <!-- Dados Pessoais -->
            <h4>Dados Pessoais</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nome Completo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nome_completo" value="{{ old('nome_completo') }}">
                    @error('nome_completo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nome Social</label>
                    <input type="text" class="form-control" name="nome_social">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Data de Nascimento <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="data_nasc" value="{{ old('data_nasc') }}">
                    @error('data_nasc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Gênero <span class="text-danger">*</span></label>
                    <select class="form-select" name="genero">
                        <option>Masculino</option>
                        <option>Feminino</option>
                        <option>Outro</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Telefone de Contato <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="tel_contato" value="{{ old('tel_contato') }}">
                    @error('tel_contato')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Telefone de Emergência </label>
                    <input type="text" class="form-control" name="tel_emergencia"
                        value="{{ old('tel_emergencia') }}">
                    @error('tel_emergencia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- <div class="col-md-6">
                <label class="form-label">Autodeclaração</label>
                <select name="autodeclaracao" id="autodeclaracao" class="form-select">
                    <option value="Branco(a)">Branco(a)</option>
                    <option value="Indigena">Indigena</option>
                    <option value="Pardo(a)">Branco(a)</option>
                    <option value="Preto(a)">Branco(a)</option>
                    <option value="Outro">Branco(a)</option>
                </select>
                @error('autodeclaracao')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Autodeclaração <span class="text-danger">*</span></label>
                    <select name="autodeclaracao" id="autodeclaracao" class="form-select">
                        <option value="Branco(a)">Branco(a)</option>
                        <option value="Indigena">Indigena</option>
                        <option value="Pardo(a)">Pardo(a)</option>
                        <option value="Preto(a)">Preto(a)</option>
                        <option value="Outro">Outro</option>
                    </select>
                    @error('autodeclaracao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Foto de Perfil <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="foto_perfil" value="{{ old('foto_perfil') }}">
                    @error('foto_perfil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{--  --}}

            </div>

            <!-- Documentos -->
            <h4>Documentos</h4>
            <div class="row mb-3">
                <div class=" mb-3 col-md-4">
                    <label class="form-label">Número do CPF <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="cpf_numero" value="{{ old('cpf_numero') }}">
                    @error('cpf_numero')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label">Foto do CPF <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="cpf_foto">
                    @error('cpf_foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label">Print da Consulta CPF <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="print_cpf_consulta">
                    @error('print_cpf_consulta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Número do RG <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="rg_numero" value="{{ old('rg_numero') }}">
                    @error('rg_numero')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">RG (Frente) <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="rg_frente">
                    @error('rg_frente')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">RG (Verso) <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="rg_verso">
                    @error('rg_verso')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>




            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Número do Título <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="titulo_num" value="{{ old('titulo_num') }}">
                    @error('titulo_num')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Zona <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="titulo_zona" value="{{ old('titulo_zona') }}">
                    @error('titulo_zona')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Seção <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="titulo_secao"
                        value="{{ old('titulo_secao') }}">
                    @error('titulo_secao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Comprovante do Título <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="titulo_comprovante">
                @error('titulo_comprovante')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">PIS/NIT <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="pis_nit" value="{{ old('pis_nit') }}">
                @error('pis_nit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Comprovante do PIS <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="comp_pis">
                @error('comp_pis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">CTPS (Frente) <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="ctps_frente">
                @error('ctps_frente')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Endereço -->
            <h4>Endereço</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Rua <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="end_rua" value="{{ old('end_rua') }}">
                    @error('end_rua')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="form-label">Número <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="end_num" value="{{ old('end_num') }}">
                    @error('end_num')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="end_complemento"
                        value="{{ old('end_complemento') }}">
                    @error('end_complemento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Bairro <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="end_bairro" value="{{ old('end_bairro') }}">
                    @error('end_bairro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Município <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="end_municipio"
                        value="{{ old('end_municipio') }}">
                    @error('end_municipio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">CEP <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="end_cep" value="{{ old('end_cep') }}">
                    @error('end_cep')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Comprovante de Residência <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="comprov_resid">
                @error('comprov_resid')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Formação -->
            <h4>Formação</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Formação <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="formacao" value="{{ old('formacao') }}">
                    @error('formacao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Certificado de Formação </label>
                    <input type="file" class="form-control" name="cert_formacao" >
                    @error('cert_formacao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- SUS -->
            <h4>Cartão SUS</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Número do SUS <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="sus_num" value="{{ old('sus_num') }}">
                    @error('sus_num')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cartão SUS (Foto) <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="sus_foto">
                    @error('sus_foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Familiares -->
            <h4>Informações Familiares</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nome da Mãe <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nome_mae" value="{{ old('nome_mae') }}">
                    @error('nome_mae')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data de Nascimento da Mãe <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="nasc_mae" value="{{ old('nasc_mae') }}">
                    @error('nasc_mae')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Nome do Pai</label>
                <input type="text" class="form-control" name="nome_pai" value="{{ old('nome_pai') }}">
                @error('nome_pai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Outros -->
            <h2>Outras Informações</h2>
            <p class="border-bottom-5"></p>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Estado Civil <span class="text-danger">*</span></label>
                    <select name="estado_civil" id="estado_civil" class="form-control">
                        <option value="Solteiro(a)">Solteiro(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viúvo(a)">Viúvo(a)</option>
                    </select>


                    @error('estado_civil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Registro Civil</label>
                    <input type="text" class="form-control" name="reg_civil">
                    @error('reg_civil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tem Reservista? <span class="text-danger">*</span></label>
                    <select class="form-select" name="tem_reservista" value="{{ old('tem_reservista') }}">
                        <option value="Sim">Não</option>
                        <option value="Nao">Sim</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Número da Reservista</label>
                    <input type="text" class="form-control" name="reservista_num"
                        value="{{ old('reservista_num') }}">
                    @error('reservista_num')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Reservista (Frente)</label>
                    <input type="file" class="form-control" name="reservista_frente">
                    @error('reservista_frente')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Reservista (Verso)</label>
                    <input type="file" class="form-control" name="reservista_verso">
                    @error('reservista_verso')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <!-- Banco -->
            <h4>Dados Bancários</h4>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Tem Conta no Santander? <span class="text-danger">*</span></label>
                    <select class="form-select" name="tem_conta_santander" value="{{ old('tem_conta_santander') }}">
                        <option value="Sim">Sim</option>
                        <option value="Nao">Não</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Agência <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="agencia" value="{{ old('agencia') }}">
                    @error('agencia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Conta <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="conta" value="{{ old('conta') }}">
                    @error('conta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Comprovante de Conta <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="comprovante_conta">
                @error('comprovante_conta')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Dependentes -->
            <div class="mb-3">
                <label class="form-label">Possui Dependentes? <span class="text-danger">*</span></label>
                <select class="form-select" name="tem_dependentes" value="{{ old('tem_dependentes') }}">
                    <option value="Sim">Sim</option>
                    <option value="Nao">Não</option>
                </select>
            </div>

            {{-- SE TIVER DEPENDENTES --}}
            <!-- Dependentes -->
            <h4>Informações do Dependente</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nome do Dependente</label>
                    <input type="text" class="form-control" name="nome_depen"
                        value="{{ old('nome_depen') }}">
                    @error('nome_depen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">CPF do Dependente</label>
                    <input type="text" class="form-control" name="dep_cpf" value="{{ old('dep_cpf') }}">
                    @error('dep_cpf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">RG do Dependente (Frente)</label>
                    <input type="file" class="form-control" name="dep_arquivo_rg_frente" >
                    @error('dep_arquivo_rg_frente')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">RG do Dependente (Verso)</label>
                    <input type="file" class="form-control" name="dep_arquivo_rg_verso">
                    @error('dep_arquivo_rg_verso')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Certidão de Nascimento</label>
                <input type="file" class="form-control" name="dep_arquivo_cert_nasc">
                @error('dep_arquivo_cert_nasc')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Cartão do SUS do Dependente</label>
                <input type="file" class="form-control" name="dep_arquivo_sus">
                @error('dep_arquivo_sus')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Declaração de Frequência Escolar</label>
                <input type="file" class="form-control" name="dep_arquivo_freq_escolar">
                @error('dep_arquivo_freq_escolar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Cartão de Vacinação / Comprovante de CEP</label>
                <input type="file" class="form-control" name="dep_arquivo_vacinacao">
                @error('dep_arquivo_vacinacao')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="d-grid border">
                <button type="submit" class="btn btn-primary btn-block fw-bold">Enviar</button>
            </div>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // alert('Hello');
        // window.alert("Atenção os campos que possuem * são obrigatórios");
    </script>
</body>

</html>
