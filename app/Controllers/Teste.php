<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Teste extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Home'];
        return view('teste', $data);
    }
}
