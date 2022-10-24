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
    <div class="col-lg-6">
        <div class="block">
            <div class="block-body">
                <!-- retornos do backend -->
                <div id="response"></div>
                <?php echo form_open('/', ['id' => 'form'], ['id' => "$usuario->id"]) ?>
                <?php echo $this->include('Usuarios/form') ?>
                <?php echo form_close() ?>
                <div class="form-group mt-5 mb-2">
                    <!-- Ações -->
                    <a href="<?php echo site_url("usuarios/exibir/$usuario->id") ?>" class="btn btn-secondary mr-2">Voltar</a>
                    <input id="btn-salvar" type="submit" value="Salvar" class="btn btn-danger mr-2">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->endSection();

$this->section('scripts');
$this->endSection();
