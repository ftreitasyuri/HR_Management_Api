<?php

namespace Database\Factories;

use App\Models\Dependente;
use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dependente>
 */
class DependenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Dependente::class;

    public function definition(): array
    {
        return [
            'funcionario_id' => Funcionario::factory(),
            'nome_depen' => $this->faker->name(),            
            'dep_cpf' => $this->faker->numerify('###.###.###-##')
        ];
    }
}
