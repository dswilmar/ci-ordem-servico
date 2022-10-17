<?php

namespace App\Database\Seeds;

use App\Models\UsuarioModel;
use CodeIgniter\Database\Seeder;

class UsuarioFakerSeeder extends Seeder
{
    public function run()
    {
        $usuarioModel = new UsuarioModel();
        $faker = \Faker\Factory::create();

        $qtdUsuariosFake = 50;
        $usuariosCriados = [];

        for ($i = 0; $i < $qtdUsuariosFake; $i++) {
            array_push($usuariosCriados, [
                'nome' => $faker->unique()->name(),
                'email' => $faker->unique()->email(),
                'senha_hash' => '123456', //mais tarde alterar
                'ativo' => true
            ]);
        }

        // echo '<pre>';
        // print_r($usuariosCriados);
        // exit;

        //pulando as validações do Model
        //desabilitando a proteção dos campos
        $usuarioModel->skipValidation(true)
            ->protect(false)
            ->insertBatch($usuariosCriados);
    }
}
