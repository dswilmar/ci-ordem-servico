<?php
$this->extend('Layouts/principal');

$this->section('titulo');
echo $titulo;
$this->endSection();

$this->section('estilos');
$this->endSection();

$this->section('conteudo');
?>

<?php
$this->endSection();

$this->section('scripts');
$this->endSection();
