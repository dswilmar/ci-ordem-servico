<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CorModel;

class Teste extends BaseController
{
    public function index()
    {
        $corModel = new CorModel();
        $data = [
            'titulo' => 'Cores',
            'cores' => $corModel->findAll()
        ];
        return view('teste', $data);
    }
}
