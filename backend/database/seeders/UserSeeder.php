<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        Empresa::create([
            'email' => 'admin@gmail.com',
            'pass' => Hash::make('1234'),

            'tipo_pessoa' => 'fisica',
            'razao_social' => 'BBBB',
            'nome_fantasia' => 'BBBB',
            'cnpj' => 'BBBB',
            'nome' => 'Admin',
            'cpf' => '18765247180',
            'telefone' => '981733060',
            'perfil' => 'AA',
            'faturamento_direto' => false,
            'identificador_estrangeiro' => 'BBBB',
            'documento_comprobatorio' => 'AAAAA',
        ]);
    }
}
