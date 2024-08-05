<?php
include 'include/header2.php';
include 'classe/Produtos.php';


$nome = new Bebidas();

$dados = $nome->ListarBebidas();

?>

<body class="d-flex align-items-center py-4 bg-body-tertiary lista">

    <section>
        <div class="circle"></div>
        <header>
            <a href="index.php" class="logo">
                <p>ADEGA IDRINK</p>
            </a>
            <nav class="navegacao">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="cadastrarbebidas.php">Cadastrar</a></li>
                    <li><a href="lista.php">Usuarios</a></li>
                    <li><a href="index.php">Sair da Conta</a></li>

                </ul>
            </nav>
        </header>
        <main class="form-table w-100 m-auto">

            <?php if (isset($_GET['deletado']) && $_GET['deletado'] == 1) {
                echo "<p class='alert alert-success'> Bebida Deletado com Sucesso </p>";
            } ?>

            <h1 class="h3 mb-3 fw-normal">Lista de Bebidas</h1>

            <table class="table table-striped table-light table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Descrição</th> <!-- Adiciona uma coluna para a descrição -->
                        <th scope="col" class="d-flex justify-content-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $value) { ?>
                        <tr>
                            <th scope="row"><?= $value['id'] ?></th>
                            <td><?= htmlspecialchars($value['nome']) ?></td>
                            <td><img src="<?= htmlspecialchars($value['img']) ?>" alt="<?= htmlspecialchars($value['nome']) ?>" style="max-width: 100px;"></td>
                            <td>R$<?= number_format($value['preco'], 2, ',', '.') ?></td>
                            <td><?= htmlspecialchars($value['descricao']) ?></td> <!-- Adiciona a descrição -->
                            <td class="d-flex justify-content-center">
                                <div class="btn-container">
                                    <a href="cadastrobebidas.php?id=<?= $value['id'] ?>" class="btn btn-warning">Editar</a>
                                    <a href="bebidasdelete.php?id=<?= $value['id'] ?>" class="btn btn-danger">Apagar</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <footer>
                <p>&copy; Painel da Adega iDrink</p>
            </footer>

        </main>
    </section>

</body>

</html>