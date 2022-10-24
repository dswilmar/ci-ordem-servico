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

    public function exibir(int $id = null)
    {
        $usuario = $this->buscaUsuario($id);
        $data = [
            'titulo' => 'Exibindo o usuário ' . esc($usuario->nome),
            'usuario' => $usuario
        ];
        return view('Usuarios/exibir', $data);
    }

    public function editar(int $id = null)
    {
        $usuario = $this->buscaUsuario($id);
        $data = [
            'titulo' => 'Editando o usuário ' . esc($usuario->nome),
            'usuario' => $usuario
        ];
        return view('Usuarios/editar', $data);
    }

    /**
     * Método que recupera um usuário
     *
     * @param integer $id
     * @return Exception|object     
     **/
    private function buscaUsuario(int $id = null)
    {
        if (!$id || !$usuario = $this->usuarioModel->withDeleted(true)->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Usuário $id não encontrado");
        }
        return $usuario;
    }
}
