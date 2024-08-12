<?php
$dsn = 'mysql:host=62.72.62.1;dbname=u687609827_idrink';
$username = 'u687609827_idrink';
$password = '0QJ0bq^O';

try {
    // Criar uma nova instância PDO para conexão com o banco de dados
    $conexao = new PDO($dsn, $username, $password);
    
    // Configurar o modo de erro do PDO para lançar exceções
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: Configurar o conjunto de caracteres para UTF-8
    $conexao->exec("set names utf8");

    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Capturar e exibir o erro se a conexão falhar
    echo "Erro na conexão: " . $e->getMessage();
    exit();
}
?>
