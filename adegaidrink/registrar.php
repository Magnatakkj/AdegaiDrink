<?php

if (isset($_POST['submit'])) {

    include_once('configregistrar.php');

    $nome = $_POST['usuario'];
    $email = $_POST['Email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO tb_usuarios(usuario,senha) VALUE ('$nome','$senha')");

    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <nav class="top-registrar">
        <a href="index.php" class="logo">
            <i class="bi bi-arrow-left"></i>
            <p> INICIO </p>
        </a>





    </nav>
    <div class="main-registrar">
        <div class="left-registrar">
            <h1>Cadastre-se já<br>E ganhe descontos na hora.</h1>
            <img src="img/adegaa.png" class="left-registrar-image" alt="Adega Cozinheiro">

        </div>
        <div class="right-registrar">
            <form class="card-registrar" method="POST" action="#">
                <h1>REGISTRE-SE</h1>
                <div class="textfield">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" placeholder="Usuario">
                </div>
                <div class="textfield">
                    <label for="email">Email</label>
                    <input type="text" name="Email" placeholder="Email">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
                <div class="textfield">
                    <label for="senha2">Confirmar a senha</label>
                    <input type="text" name="confirmarsenha" placeholder="Digite sua senha novamente">
                </div>
                <input type="submit" name="submit" id="submit">
                <div class="text-btn">
                    <p>Já tem uma conta? <a href="minhaconta.php">Entrar</a></p>

                </div>
            </form>
        </div>
    </div>
</body>

</html>