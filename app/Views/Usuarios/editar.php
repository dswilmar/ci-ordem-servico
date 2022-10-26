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
                <div class="form-group mt-5 mb-2">
                    <!-- Ações -->
                    <a href="<?php echo site_url("usuarios/exibir/$usuario->id") ?>" class="btn btn-secondary mr-2">Voltar</a>
                    <input id="btn-salvar" type="submit" value="Salvar" class="btn btn-danger mr-2">
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<?php
$this->endSection();

$this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('usuarios/atualizar'); ?>',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#response').html('');
                    $('#btn-salvar').val('Salvando...');
                },
                success: function(response) {
                    $('#btn-salvar').val('Salvar');
                    $('#btn-salvar').removeAttr('disabled');

                    $('[name=csrf_ordem_servico]').val(response.token);

                    if (!response.erro) {
                        if (response.info) {
                            $('#response').html('<div class="alert alert-primary">' + response.info + '</div>');
                        } else {
                            //tudo certo com a atualização do usuário
                            window.location.href = '<?php echo site_url("usuarios/exibir/$usuario->id") ?>';
                        }
                    } else {
                        //existem erros de validação
                        $('#response').html('<div class="alert alert-danger">' + response.erro + '</div>');
                    }
                },
                error: function() {
                    alert('Não foi possível processar a solicitação. Tente novamente.');
                    $('#btn-salvar').val('Salvar');
                    $('#btn-salvar').removeAttr('disabled');
                }
            });
        });
    });
</script>
<?php
$this->endSection();
