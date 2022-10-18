<?php
$this->extend('Layouts/principal');

$this->section('titulo');
echo $titulo;
$this->endSection();

$this->section('estilos'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/datatables.min.css" />
<?php $this->endSection();

$this->section('conteudo'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="block">
            <div class="table-responsive">
                <table id="ajax-table" class="table table-striped table-sm" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$this->endSection();

$this->section('scripts'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-table').DataTable({
            ajax: "<?php echo site_url('usuarios/recuperausuarios') ?>",
            columns: [{
                    "data": "imagem"
                },
                {
                    "data": "nome"
                },
                {
                    "data": "email"
                },
                {
                    "data": "ativo"
                },
            ]
        });
    });
</script>
<?php
$this->endSection();
