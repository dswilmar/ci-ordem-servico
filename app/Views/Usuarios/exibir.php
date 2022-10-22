<?php
$this->extend('Layouts/principal');

$this->section('titulo');
echo $titulo;
$this->endSection();

$this->section('estilos');
$this->endSection();

$this->section('conteudo');
?>
<div class="row">
    <div class="col-lg-4">
        <div class="block">
            <div class="text-center">
                <?php if ($usuario->imagem == null) : ?>
                    <img src="<?php echo site_url('assets/img/usuario_sem_imagem.png') ?>" class="card-img-top" style="width: 90%:" alt="Usuário sem imagem">
                <?php else : ?>
                    <img src="<?php echo site_url("usuarios/imagem/$usuario->imagem") ?>" class="card-img-top" style="width: 90%:" alt="<?php echo esc($usuario->nome) ?>">
                <?php endif; ?>
                <a href="<?php echo site_url("usuarios/editarimagem/$usuario->id") ?>" class="btn btn-outline-primary btn-sm mt-3">Alterar imagem</a>
            </div>
            <hr class="border-secondary">
            <h5 class="card-title mt-2"><?php echo $usuario->nome ?></h5>
            <p class="card-text"><?php echo esc($usuario->email) ?></p>
            <p class="card-text">Criado <?php echo $usuario->criado_em->humanize() ?></p>
            <p class="card-text">Atualizado <?php echo $usuario->atualizado_em->humanize() ?></p>
            <!-- Ações -->
            <a href="<?php echo site_url("usuarios") ?>" class="btn btn-secondary mr-2">Voltar</a>
            <div class="btn-group">
                <button type="button" class="btn btn-danger">Ações</button>
                <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo site_url("usuarios/editar/$usuario->id") ?>">Editar usuário</a>
                    <div class="dropdown-divider"></div>
                    <!-- <a class="dropdown-item" href="<?php echo site_url("usuarios/editar/$usuario->id") ?>">Excluir usuário</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->endSection();

$this->section('scripts');
$this->endSection();
