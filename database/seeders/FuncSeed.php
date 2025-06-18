<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Funcionario::factory()->count(50)->create();
    }
}
