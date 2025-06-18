<?php

namespace Database\Factories;

use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionario>
 */
class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Funcionario::class;
    public function definition(): array
    {
        return [
            'nome_completo' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'nome_social' => $this->faker->optional()->name(),
            'data_nasc' => $this->faker->date(),
            'genero' => $this->faker->randomElement(['Masculino', 'Feminino', 'Outro']),
            'tel_contato' => $this->faker->phoneNumber(),
            'tel_emergencia' => $this->faker->phoneNumber(),
            'autodeclaracao' => $this->faker->randomElement(['Preto(a)','Branco(a)', 'Pardo(a)', 'Indigena','Outro']),
            'rg_numero' => $this->faker->numerify('##.###.###-#'),
            'cpf_numero' => $this->faker->numerify('###.###.###-##'),
            'titulo_num' => $this->faker->numerify('######'),
            'titulo_zona' => $this->faker->numerify('###'),
            'titulo_secao' => $this->faker->numerify('###'),
            'pis_nit' => $this->faker->numerify('###.#####.##-#'),
            'end_rua' => $this->faker->randomElement(
                [
                    "Avenida Paulista (São Paulo)",
                    "Rua Augusta (São Paulo)",
                    "Rua Oscar Freire (São Paulo)",
                    "Avenida Ipiranga (São Paulo)",
                    "Rua 25 de Março (São Paulo)",
                    "Avenida Brigadeiro Faria Lima (São Paulo)",
                    "Rua Vergueiro (São Paulo)",
                    "Avenida Rebouças (São Paulo)",
                    "Rua da Consolação (São Paulo)",
                    "Avenida Morumbi (São Paulo)",
                    "Avenida Tiradentes (Guarulhos)",
                    "Rua Dom Pedro II (Guarulhos)",
                    "Avenida Salgado Filho (Guarulhos)",
                    "Rua Quinze de Novembro (Guarulhos)",
                    "Avenida Esperança (Guarulhos)",
                    "Avenida Brasil (Campinas)",
                    "Rua Barão de Jaguara (Campinas)",
                    "Avenida Norte-Sul (Campinas)",
                    "Rua Treze de Maio (Campinas)",
                    "Avenida Andrade Neves (Campinas)",
                    "Avenida Pereira Barreto (São Bernardo do Campo)",
                    "Rua Marechal Deodoro (São Bernardo do Campo)",
                    "Avenida Lucas Nogueira Garcez (São Bernardo do Campo)",
                    "Rua Jurubatuba (São Bernardo do Campo)",
                    "Avenida Faria Lima (São Bernardo do Campo)",
                    "Rua das Figueiras (Santo André)",
                    "Avenida Dom Pedro I (Santo André)",
                    "Rua Campos Sales (Santo André)",
                    "Avenida Portugal (Santo André)",
                    "Rua Coronel Oliveira Lima (Santo André)",
                    "Avenida dos Autonomistas (Osasco)",
                    "Rua Antônio Agu (Osasco)",
                    "Avenida Hirant Sanazar (Osasco)",
                    "Rua General Bittencourt (Osasco)",
                    "Avenida Getúlio Vargas (Osasco)",
                    "Avenida Dom Aguirre (Sorocaba)",
                    "Rua da Penha (Sorocaba)",
                    "Avenida General Carneiro (Sorocaba)",
                    "Rua Barão de Tatuí (Sorocaba)",
                    "Avenida São Paulo (Sorocaba)",
                    "Avenida Nove de Julho (Ribeirão Preto)",
                    "Rua São Sebastião (Ribeirão Preto)",
                    "Avenida Presidente Vargas (Ribeirão Preto)",
                    "Rua Prudente de Morais (Ribeirão Preto)",
                    "Avenida Costábile Romano (Ribeirão Preto)",
                    "Avenida Andrômeda (São José dos Campos)",
                    "Rua XV de Novembro (São José dos Campos)",
                    "Avenida São João (São José dos Campos)",
                    "Rua Barão de Jacareí (São José dos Campos)",
                    "Avenida Juscelino Kubitschek (São José dos Campos)",
                    "Avenida Ana Costa (Santos)",
                    "Rua XV de Novembro (Santos)",
                    "Avenida da Praia (Santos)",
                    "Rua Tolentino Filgueiras (Santos)",
                    "Avenida Afonso Pena (Santos)"
                ]
            ),
            'end_num' => $this->faker->buildingNumber(),
            'end_complemento' => $this->faker->secondaryAddress(),
            'end_bairro' => $this->faker->randomElement(
                [
                    "Pinheiros (São Paulo)",
                    "Vila Madalena (São Paulo)",
                    "Itaim Bibi (São Paulo)",
                    "Moema (São Paulo)",
                    "Liberdade (São Paulo)",
                    "Centro (São Paulo)",
                    "Vila Augusta (Guarulhos)",
                    "Picanço (Guarulhos)",
                    "Macedo (Guarulhos)",
                    "Gopoúva (Guarulhos)",
                    "Bosque Maia (Guarulhos)",
                    "Cambuí (Campinas)",
                    "Guanabara (Campinas)",
                    "Taquaral (Campinas)",
                    "Cambuí (Campinas)",
                    "Nova Campinas (Campinas)",
                    "Centro (São Bernardo do Campo)",
                    "Jardim do Mar (São Bernardo do Campo)",
                    "Nova Petrópolis (São Bernardo do Campo)",
                    "Rudge Ramos (São Bernardo do Campo)",
                    "Assunção (São Bernardo do Campo)",
                    "Centro (Santo André)",
                    "Jardim (Santo André)",
                    "Vila Assunção (Santo André)",
                    "Campestre (Santo André)",
                    "Utinga (Santo André)",
                    "Centro (Osasco)",
                    "Vila Yara (Osasco)",
                    "Bela Vista (Osasco)",
                    "Jardim das Flores (Osasco)",
                    "Presidente Altino (Osasco)",
                    "Centro (Sorocaba)",
                    "Mangal (Sorocaba)",
                    "Campolim (Sorocaba)",
                    "Vila Hortência (Sorocaba)",
                    "Jardim Paulistano (Sorocaba)",
                    "Jardim Botânico (Ribeirão Preto)",
                    "Nova Aliança (Ribeirão Preto)",
                    "Alto da Boa Vista (Ribeirão Preto)",
                    "Iguatemi (Ribeirão Preto)",
                    "Centro (Ribeirão Preto)",
                    "Jardim Aquarius (São José dos Campos)",
                    "Vila Adyana (São José dos Campos)",
                    "Urbanova (São José dos Campos)",
                    "Esplanada (São José dos Campos)",
                    "Centro (São José dos Campos)",
                    "Gonzaga (Santos)",
                    "Boqueirão (Santos)",
                    "Ponta da Praia (Santos)",
                    "Embaré (Santos)",
                    "Centro (Santos)"
                ]

            ),
            'end_municipio' => $this->faker->randomElement([
                "São Paulo",
                "Guarulhos",
                "Campinas",
                "São Bernardo do Campo",
                "Santo André",
                "Osasco",
                "Sorocaba",
                "Ribeirão Preto",
                "São José dos Campos",
                "Santos"
            ]),
            'end_cep' => $this->faker->postcode(),
            'formacao' => $this->faker->randomElement(['Ensino Médio', 'Técnico', 'Superior']),
            'sus_num' => $this->faker->numerify('### #### #### ####'),
            'estado_civil' => $this->faker->randomElement(['Solteiro', 'Casado', 'Divorciado']),
            'reg_civil' => $this->faker->word(),
            'tem_reservista' => $this->faker->randomElement(['Sim', 'Nao']),
            'reservista_num' => $this->faker->optional()->numerify('###########'),
            'nome_mae' => $this->faker->name('female'),
            'nasc_mae' => $this->faker->date(),
            'nome_pai' => $this->faker->name('male'),
            'print_cpf_consulta' => $this->faker->optional()->word(),
            'tem_conta_santander' => $this->faker->randomElement(['Sim', 'Nao']),
            'agencia' => $this->faker->numerify('####'),
            'conta' => $this->faker->numerify('#########'),
            'tem_dependentes' => $this->faker->randomElement(['Sim', 'Nao']),
            'area_atuacao' => $this->faker->randomElement(
                [
                    "Recursos Humanos",
                    "Operações",
                    "Tecnologia da Informação",
                    "Vendas",
                    "Marketing",
                    "Financeiro",
                    "Jurídico",
                    "Administrativo",
                    "Logística",
                    "Comercial"
                ]
            ),
            'cargo' => $this->faker->randomElement(
                [
                    // Recursos Humanos
                    "Analista de RH",
                    "Especialista em Recrutamento e Seleção",
                    "Coordenador de Treinamento e Desenvolvimento",

                    // Operações
                    "Gerente de Projetos",
                    "Analista de Processos",
                    "Supervisor de Produção",

                    // Tecnologia da Informação
                    "Desenvolvedor Front-end",
                    "Desenvolvedor Back-end",
                    "Analista de Sistemas",
                    "Engenheiro de Dados",

                    // Vendas
                    "Vendedor",
                    "Executivo de Contas",
                    "Gerente de Vendas",

                    // Marketing
                    "Analista de Marketing Digital",
                    "Especialista em SEO",

                    // Financeiro
                    "Analista Financeiro",
                    "Contador",

                    // Administrativo
                    "Assistente Administrativo",

                    // Logística
                    "Analista de Logística",

                    // Comercial (pode se sobrepor a Vendas)
                    "Representante Comercial"
                ]
            ),
            'nome_lider' => $this->faker->name(),
            'situacao' => $this->faker->randomElement(['Ativo', 'Desativado']),

            //    $table->string('cargo')->nullable();
            // $table->string('area_atuacao')->nullable();
            // $table->string('nome_lider')->nullable();
            // $table->boolean('situacao')->nullable();
        ];
    }
}
