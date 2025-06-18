<?php

namespace Database\Seeders;

use App\Models\Dependente;
use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $funcionarios = Funcionario::all();

        foreach ($funcionarios as $funcionario) {
            // Verifica se o funcionário tem dependentes
            if (rand(0, 1)) {
                // Cria entre 1 e 3 dependentes por funcionário
                Dependente::factory(rand(1, 3))->create([
                    'funcionario_id' => $funcionario->id,
                ]);
            }
        }
    }
}
