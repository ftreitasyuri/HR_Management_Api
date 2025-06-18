<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Autenticacao;
use Illuminate\Support\Facades\Storage;
use App\Models\Funcionario;
use App\Models\Dependente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;
use Illuminate\Validation\Rules\Date;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // returna all funcionarios
        return response()->json(Funcionario::all(), 200);
    }



    public function store(Request $request)
    {
        // Validação

        // dd($request);
  
        
        $validated = $request->validate(
            [
                // 🔹 DADOS PESSOAIS
                'nome_completo' => 'required|string|max:255',
                'nome_social' => 'nullable|string|max:255',
                'data_nasc' => 'required|date',
                'genero' => 'required|string',
                'autodeclaracao' => 'required|string',
                'estado_civil' => 'required|string',
                'reg_civil' => 'nullable|string',
                'tem_reservista' => 'required|string',
                'reservista_num' => 'nullable|string|max:50',
                'nome_mae' => 'required|string|max:255',
                'nasc_mae' => 'required|date',
                'nome_pai' => 'nullable|string|max:255',

                // 🔹 CONTATO
                'email' => 'required|email|max:255',
                'tel_contato' => 'required|string|max:20',
                'tel_emergencia' => 'required|string|max:20',

                // 🔹 DOCUMENTOS
                'rg_numero' => 'required|string|max:20',
                'cpf_numero' => 'required|string|max:14',
                'titulo_num' => 'required|string|max:20',
                'titulo_zona' => 'required|string|max:10',
                'titulo_secao' => 'required|string|max:10',
                'pis_nit' => 'required|string|max:20',
                'sus_num' => 'required|string|max:20',
                'print_cpf_consulta' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',

                // 🔹 ENDEREÇO
                'end_rua' => 'required|string|max:255',
                'end_num' => 'required|string|max:10',
                'end_complemento' => 'required|string|max:255',
                'end_bairro' => 'required|string|max:100',
                'end_municipio' => 'required|string|max:100',
                'end_cep' => 'required|string|max:10',

                // 🔹 BANCÁRIOS
                'tem_conta_santander' => 'required|string',
                'tem_dependentes' => 'required|string',
                'agencia' => 'required|string|max:10',
                'conta' => 'required|string|max:20',

                // 🔹 FORMAÇÃO
                'formacao' => 'required|string|max:100',

                // 🔹 ARQUIVOS
                'foto_perfil' => 'required|file|mimes:jpg,jpeg,png|max:5120',
                'rg_frente' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'rg_verso' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'cpf_foto' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'titulo_comprovante' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'comp_pis' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'ctps_frente' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'comprov_resid' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'cert_formacao' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'sus_foto' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'reservista_frente' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'reservista_verso' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'comprovante_conta' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            ],
            [
                // 🔹 DADOS PESSOAIS
                'nome_completo.required' => 'O nome completo é obrigatório.',
                'nome_completo.max' => 'O nome completo deve ter no máximo 255 caracteres.',
                'nome_social.max' => 'O nome social deve ter no máximo 255 caracteres.',
                'data_nasc.required' => 'A data de nascimento é obrigatória.',
                'data_nasc.date' => 'Informe uma data de nascimento válida.',
                'genero.required' => 'O campo gênero é obrigatório.',
                'autodeclaracao.required' => 'O campo autodeclaração é obrigatório.',
                'estado_civil.required' => 'O estado civil é obrigatório.',
                'reg_civil.string' => 'O registro civil deve ser um texto.',
                'tem_reservista.required' => 'Informe se possui reservista.',
                'tem_reservista.boolean' => 'O campo reservista deve ser verdadeiro ou falso.',
                'reservista_num.max' => 'O número do reservista deve ter no máximo 50 caracteres.',
                'nome_mae.required' => 'O nome da mãe é obrigatório.',
                'nome_mae.max' => 'O nome da mãe deve ter no máximo 255 caracteres.',
                'nasc_mae.required' => 'A data de nascimento da mãe é obrigatória.',
                'nasc_mae.date' => 'Informe uma data válida para o nascimento da mãe.',
                'nome_pai.max' => 'O nome do pai deve ter no máximo 255 caracteres.',

                // 🔹 CONTATO
                'email.required' => 'O e-mail é obrigatório.',
                'email.email' => 'Informe um e-mail válido.',
                'email.max' => 'O e-mail deve ter no máximo 255 caracteres.',
                'tel_contato.required' => 'O telefone de contato é obrigatório.',
                'tel_contato.max' => 'O telefone de contato deve ter no máximo 20 caracteres.',
                'tel_emergencia.required' => 'O telefone de emergência é obrigatório.',
                'tel_emergencia.max' => 'O telefone de emergência deve ter no máximo 20 caracteres.',

                // 🔹 DOCUMENTOS
                'rg_numero.required' => 'O número do RG é obrigatório.',
                'rg_numero.max' => 'O número do RG deve ter no máximo 20 caracteres.',
                'cpf_numero.required' => 'O número do CPF é obrigatório.',
                'cpf_numero.max' => 'O número do CPF deve ter no máximo 14 caracteres.',
                'titulo_num.required' => 'O número do título de eleitor é obrigatório.',
                'titulo_num.max' => 'O número do título deve ter no máximo 20 caracteres.',
                'titulo_zona.required' => 'A zona eleitoral é obrigatória.',
                'titulo_zona.max' => 'A zona eleitoral deve ter no máximo 10 caracteres.',
                'titulo_secao.required' => 'A seção eleitoral é obrigatória.',
                'titulo_secao.max' => 'A seção eleitoral deve ter no máximo 10 caracteres.',
                'pis_nit.required' => 'O número do PIS/NIT é obrigatório.',
                'pis_nit.max' => 'O número do PIS/NIT deve ter no máximo 20 caracteres.',
                'sus_num.required' => 'O número do SUS é obrigatório.',
                'sus_num.max' => 'O número do SUS deve ter no máximo 20 caracteres.',
                'print_cpf_consulta.required' => 'O comprovante de consulta do CPF é obrigatório.',
                'print_cpf_consulta.file' => 'O arquivo de consulta do CPF deve ser um arquivo válido.',
                'print_cpf_consulta.mimes' => 'O arquivo de consulta do CPF deve ser do tipo: jpg, jpeg, png ou pdf.',
                'print_cpf_consulta.max' => 'O arquivo deve ter no máximo 5MB.',

                // 🔹 ENDEREÇO
                'end_rua.required' => 'A rua é obrigatória.',
                'end_rua.max' => 'A rua deve ter no máximo 255 caracteres.',
                'end_num.required' => 'O número do endereço é obrigatório.',
                'end_num.max' => 'O número do endereço deve ter no máximo 10 caracteres.',
                'end_complemento.required' => 'O complemento do endereço é obrigatório.',
                'end_complemento.max' => 'O complemento deve ter no máximo 255 caracteres.',
                'end_bairro.required' => 'O bairro é obrigatório.',
                'end_bairro.max' => 'O bairro deve ter no máximo 100 caracteres.',
                'end_municipio.required' => 'O município é obrigatório.',
                'end_municipio.max' => 'O município deve ter no máximo 100 caracteres.',
                'end_cep.required' => 'O CEP é obrigatório.',
                'end_cep.max' => 'O CEP deve ter no máximo 10 caracteres.',

                // 🔹 BANCÁRIOS
                'tem_conta_santander.required' => 'Informe se possui conta no Santander.',
                'tem_conta_santander.boolean' => 'O campo deve ser verdadeiro ou falso.',
                'agencia.required' => 'A agência é obrigatória.',
                'agencia.max' => 'A agência deve ter no máximo 10 caracteres.',
                'conta.required' => 'A conta bancária é obrigatória.',
                'conta.max' => 'A conta bancária deve ter no máximo 20 caracteres.',

                // 🔹 FORMAÇÃO
                'formacao.required' => 'O campo formação é obrigatório.',
                'formacao.max' => 'A formação deve ter no máximo 100 caracteres.',

                // 🔹 ARQUIVOS
                'foto_perfil.required' => 'A foto de perfil é obrigatória.',
                'rg_frente.required' => 'A imagem da frente do RG é obrigatória.',
                'rg_verso.required' => 'A imagem do verso do RG é obrigatória.',
                'cpf_foto.required' => 'A imagem do CPF é obrigatória.',
                'titulo_comprovante.required' => 'O comprovante do título de eleitor é obrigatório.',
                'comp_pis.required' => 'O comprovante do PIS é obrigatório.',
                'ctps_frente.required' => 'A imagem da frente da CTPS é obrigatória.',
                'comprov_resid.required' => 'O comprovante de residência é obrigatório.',
                'cert_formacao.required' => 'O certificado de formação é obrigatório.',
                'sus_foto.required' => 'A imagem do cartão SUS é obrigatória.',
                'reservista_frente.mimes' => 'A frente do reservista deve ser uma imagem ou PDF.',
                'reservista_verso.mimes' => 'O verso do reservista deve ser uma imagem ou PDF.',
                'comprovante_conta.required' => 'O comprovante da conta bancária é obrigatório.',

                // Validações genéricas para arquivos
                '*.file' => 'O campo deve ser um arquivo válido.',
                '*.mimes' => 'O arquivo deve ser do tipo: jpg, jpeg, png ou pdf.',
                '*.max' => 'O arquivo deve ter no máximo 5MB.',
            ]
        );


        // Após validação
        // Uploads
        $fileFields = [
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
            'dep_arquivo_rg_frente',
            'dep_arquivo_rg_verso',
            'dep_arquivo_sus',
            'dep_arquivo_cert_nasc',
            'dep_arquivo_freq_escolar',
            'dep_arquivo_vacinacao'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store("uploads/{$field}", 'public');
            }
        }

        // Criação do funcionário
        $funcionario = Funcionario::create($validated);

        // Debug: Verificar se dados do dependente estão chegando
        
        Log::info('Dados do dependente', [
            'nome' => $request->input('nome_depen'),
            'cpf' => $request->input('cpf_dep'),
        ]);

        // Se tiver dados de dependente, criar relacionamento
        if ($request->filled('nome_depen')) {
            $funcionario->dependentes()->create([
                'nome_depen' => $request->input('nome_depen'),
                'cpf_dep' => $request->input('cpf_dep'),
                'dep_arquivo_rg_frente' => $validated['dep_arquivo_rg_frente'] ?? null,
                'dep_arquivo_rg_verso' => $validated['dep_arquivo_rg_verso'] ?? null,
                'dep_arquivo_cert_nasc' => $validated['dep_arquivo_cert_nasc'] ?? null,
                'dep_arquivo_sus' => $validated['dep_arquivo_sus'] ?? null,
                'dep_arquivo_freq_escolar' => $validated['dep_arquivo_freq_escolar'] ?? null,
                'dep_arquivo_vacinacao' => $validated['dep_arquivo_vacinacao'] ?? null,
            ]);
        }

        // Cancelando acesso do funcionário após preencher corretamente o forms
        $user = auth()->user();
        $token = Str::random(20);
        $user->password = bcrypt($token);
        $user->deleted_at = now();
        $user->save();

        // Efetuando o logout
        auth()->logout();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Funcionário criado com sucesso!',
                'data' => $funcionario->load('dependentes'),
            ]);
        }

        return redirect()->route('login')->with('success', 'Formulário enviado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $func = Funcionario::find($id)->dependente;
        $func = Funcionario::with('dependentes')->find($id);

        if ($func) {
            return response()->json($func, 200);
        } else {
            return response()->json(
                [
                    'message' => 'Funcionario não encontrado!'
                ],
                404
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validate the request
        $request->validate(
            [
                'nome_completo' => 'required',
                'email' => 'required|email|unique:funcionarios,email,' . $id,

                'data_nasc' => 'required',
                'genero' => 'required',
                'tel_contato' => 'required',
                'tel_emergencia' => 'required',
                'autodeclaracao' => 'required'
            ],
            []
        );


        // Update data
        $func = Funcionario::find($id);

        if ($func) {

            $func->update($request->all());

            return response()->json(
                [
                    'message' => 'Funcionario editado com sucesso!',
                    'data' => $func,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'message' => 'Funcionario não encontrado!'
                ],
                404
            );
        }
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $func = Funcionario::find($id);

        if ($func) {

            $func->delete($id);

            return response()->json(
                [
                    'message' => 'Funcionario deletado com sucesso!'

                ],
                200
            );
        } else {
            return response()->json(
                [
                    'message' => 'Funcionario não encontrado!'
                ],
                404
            );
        }
    }
    // "http://127.0.0.1:8000/";
    // $nome = $request->nome;
    // $email = $request->email;


// Função enviar link para o email do novo funcionário
    public function enviarLink(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email'
        ]);

        $nome = $request->nome;
        $email = $request->email;

        // Token para acessar o forms
        $token = Str::random(35);
        $passwordFunc = 'fun' . $token;

        // Criando usuário nivel FUNC
        $user = new User();
        $user->name = $nome;
        $user->email = $email;
        $user->password = bcrypt($passwordFunc);
        $user->nivel_acesso = 'Func';
        $user->remember_token = $token;
        $user->save();

        $link = route('login');

        // Enviar email:
        Mail::to($email)->send(new \App\Mail\LinkFormularioMail($nome, $link));

        return response()->json([
            'message' => 'Link enviado com sucesso!',
            'token' => $passwordFunc
        ]);
    }
}
