<?php
include 'classe/Usuario.php';

if (!empty($_POST['id_para_alterar'])) {

    // $nome = $_POST['nome'];
    
    $user = $_POST['usuario'];
    $password = $_POST['senha'];
    $passwordConfirm = $_POST['confirma'];
    $id_para_alterar = $_POST['id_para_alterar'];


    $usuario = new Usuario();

    $resultado = $usuario->AtualizarUsuario(/*$nome,*/ $user, $password, $passwordConfirm, $id_para_alterar);
}
