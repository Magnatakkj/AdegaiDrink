<?php

$dsn = 'mysql:host=62.72.62.1;dbname=u687609827_idrink';
$username = 'u687609827_idrink';
$password = '0QJ0bq^O';

try {
    $conexao = new PDO($dsn, $username, $password);
    // Definir o modo de erro para exceção
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}
?>
