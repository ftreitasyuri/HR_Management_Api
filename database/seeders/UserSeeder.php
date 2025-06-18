<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add user
        $user = new User();
        $user->name = 'ftreitas18';
        $user->email = 'yuri@dev.com';
        $user->password = bcrypt('admin123');
        $user->nivel_acesso = 'Admin';
        $user->remember_token = Str::random(35);
        $user->save();
    }
}
