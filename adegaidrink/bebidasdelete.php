<?php
include './classe/Produtos.php';
include './include/header.php';

var_dump($_GET);

$nome = new Bebidas();

$id = $_GET['id'];

$nome = new Bebidas();

$nome->DeleteBebida($id);

$resultado = $nome->DeleteBebida($id);

var_dump($resultado);

if ($resultado == 1) {
    header('location:lista2.php?deletado=1');

}
