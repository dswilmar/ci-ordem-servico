<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Usuários'
        ];

        return view('Usuarios/index', $data);
    }

    public function recuperaUsuarios()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $atributos = ['id', 'nome', 'email', 'ativo', 'imagem'];
        $usuarios = $this->usuarioModel->select($atributos)->findAll();

        $data = [];

        foreach ($usuarios as $usuario) {
            $data[] = [
                'imagem' => $usuario->imagem,
                'nome' => anchor("usuarios/exibir/$usuario->id", esc($usuario->nome)),
                'email' => esc($usuario->email),
                'ativo' => ($usuario->ativo == true) ? '<span class="text-success"><i class="fa fa-unlock"></i></span> Ativo' : '<span class="text-warning"><i class="fa fa-lock"></i></span> Inativo',
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }
}
