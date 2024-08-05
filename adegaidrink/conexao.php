<?php 
$servidor = '62.72.62.1';
$banco = 'u687609827_idrink';
$usuariobd = 'u687609827_idrink';
$senhabd = '0QJ0bq^O';

try{
    $conexao = mysqli_connect($servidor, $usuariobd, $senhabd, $banco);
}catch(Exception  $e){
    echo "Erro na conexão: $e";
    exit();
} 
?>