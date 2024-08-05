<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylecadprod.css">
    <title>Cadastrar Produto</title>
</head>

<body>

    <main class="main-section">

        <div class="menu"></div>
        <header>
            <a href="index.php" class="logo">
                <p>ADEGA IDRINK</p>

            </a>
            <nav class="navegacao">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="lista2.php">Voltar a Lista</a></li>
                </ul>
            </nav>

        </header>

        <section class="container normal-section">
            <h2 class="section-title">Cadastrar Novo Produto</h2>
            <form action="cadastrar_produto.php" method="POST" enctype="multipart/form-data">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="img">Imagem:</label>
                <input type="file" id="img" name="img" required>

                <label for="preco">Preço:</label>
                <input type="text" id="preco" name="preco" required>

                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="4" required></textarea>

                <button type="submit">Cadastrar Produto</button>
            </form>
        </section>
    </main>
</body>

</html>