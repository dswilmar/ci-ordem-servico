<?php

namespace App\Database\Seeds;

use App\Models\CorModel;
use CodeIgniter\Database\Seeder;

class CorSeeder extends Seeder
{
    public function run()
    {
        $cores = [
            ['nome' => 'Azul'],
            ['nome' => 'Amarelo'],
            ['nome' => 'Vermelho']
        ];

        $corModel = new CorModel();

        foreach ($cores as $cor) {
            $corModel->insert($cor);
        }
    }
}
