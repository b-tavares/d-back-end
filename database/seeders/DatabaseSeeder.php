<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /*\App\Models\User::create([
            'name' => 'Usuário de teste',
            'email' => 'usuarioa@teste.com.br',
            'password' => bcrypt( 'senha123' ),
        ]);*/

        \App\Models\Client::create([
            'name' => 'Ana',
            'cpf' => '123456789',
            'phone' => '27999999999',
            'email' => 'aa@aa.com.br',
        ]);

        \App\Models\Client::create([
            'name' => 'Bruna',
            'cpf' => '234567890',
            'phone' => '2799999998',
            'email' => 'bb@bb.com.br',
        ]);
    }
}
