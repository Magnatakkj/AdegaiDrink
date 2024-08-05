<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDrink - MinhaConta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>


<?php
if (isset($_POST) && !empty($_POST)) {
    //var_dump($_POST);
    $user = $_POST['usuario'];
    $password = $_POST['senha'];
    // new PDO cria a conexão com o banco de dados
    $conn = new PDO("mysql:host=62.72.62.1;dbname=u687609827_idrink", "u687609827_idrink", "0QJ0bq^O");
    // $script guarda um script para a a consulta do banco, nesse caso verifica se a senha e usuario é igual
    $script = "SELECT * FROM tb_usuarios WHERE usuario = '{$user}' AND senha = '{$password}'";
    // -> query executa o script e o -> fetch retorna o resultado do script
    // $resultado guarda o resultado da consulta
    $resultado = $conn->query($script)->fetch();
    // verifico se a variavel resultado tem algum valor
    if (!empty($resultado)) {
        echo "<script>alert('Usuario Validado com sucesso!!!');</script>";
        // esse header redireciona a pagina

        

        if (isset($resultado['usuario']) && $resultado['admin'] == "admin"){

            header('location:lista.php');
            
        } else {
            header('location:index.php?id=sim');
        } 
        


    } 
}
?>


<body>
    <nav class="top-login">
        <a href="index.php" class="logo">
            <i class="bi bi-arrow-left"></i>
            <p> INICIO </p>
        </a>






    </nav>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça login<br>E desfrute das melhores bebidas.</h1>
            <img src="img/adegaa.png" class="left-login-image" alt="Adega Cozinheiro">

        </div>
        <form action="#" method="POST" class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <div class="textfield">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" placeholder="Usuario">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
                <input type="submit" class="btn-login" value="Acessar">
                <div class="text-btn">
                    <p>Não tem uma conta? <a href="registrar.php">Registrar</a></p>

                </div>
            </div>
        </form>
    </div>




</body>

</html>