<?php

include 'include/header.php';
include 'classe/Produtos.php';

$nome = new Bebidas();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id_para_alterar']) ? $_POST['id_para_alterar'] : null;
    $nomeBebida = $_POST['nome'];
    $img = $_POST['img'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    if ($id) {
        // Atualiza a bebida existente
        $nome->AtualizarBebida($id, $nomeBebida, $img, $preco, $descricao);
    } else {
        // Lógica para adicionar nova bebida, se necessário
    }

    // Redireciona após a atualização
    header('Location: lista2.php');
    exit();
}