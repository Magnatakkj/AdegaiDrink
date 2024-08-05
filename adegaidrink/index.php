<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ADEGA IDRINK</title>

</head>

<?php

if (isset($_GET) && !empty($_GET)) {
    echo "<script>alert('Usuario Validado com sucesso!!!');</script>";
}
?>

<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="index.php" class="logo">
                <p>ADEGA IDRINK</p>
            </a>
            <nav class="navegacao">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="sobrenos.php">Sobre Nós</a></li>
                    <li><a href="minhaconta.php"><i class="bi bi-person"></i></a></li>
                    
                </ul>
            </nav>
        </header>
        <div class="content">
            <div class="text">
                <h2>BEM VINDO Á<br><span>ADEGA IDRINK</span></h2>
                <p>Descubra um mundo de sabores na adega iDrink! Se você é um apreciador de bebidas de qualidade, está no lugar certo. Na iDrink, você encontrará uma seleção impecável das melhores bebidas, desde vinhos finos até destilados exclusivos.</p>
                <a href="produtosindex.php">VER TODOS OS PRODUTOS</a>
            </div>
        </div>
        <ul class="icons">
            <li><a href="#"><img src="img/facebook.png" alt=""></a></li>
            <li><a href="#"><img src="img/twitter.png" alt=""></a></li>
            <li><a href="#"><img src="img/instagram.png" alt=""></a></li>
        </ul>
        <div class="boxImg">
            <img src="img/jack daniels.png" alt="" class="img1">
            <img src="img/Budweiser.png" alt="" class="img2">
            <img src="img/heineken.png" alt="" class="img3">
            
        </div>
    </section>
</body>
</html>