<?php
include 'include/header.php';
include 'classe/Usuario.php';


$usuario = new Usuario();

$dados = $usuario->ListarUsuarios();

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
                    <li><a href="lista2.php">Bebidas</a></li>
                    <li><a href="index.php">Sair da Conta</a></li>

                </ul>
            </nav>
        </header>
        <main class="form-table w-100 m-auto">

            <?php if (isset($_GET['deletado']) && $_GET['deletado'] == 1) {
                echo "<p class='alert alert-success'> Usuario Deletado com Sucesso </p>";
            }


            ?>

            <h1 class="h3 mb-3 fw-normal">Lista de Usuarios</h1>

            <table class="table table-striped table-light table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Senha</th>
                        <th scope="col" class="d-flex justify-content-center ">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $value) { ?>


                        <tr>
                            <th scope="row"><?= $value['id'] ?></th>
                            <td><?= $value['usuario'] ?></td>
                            <td><?= $value['senha'] ?></td>
                            <td class="d-flex justify-content-center gap-1">
                                <a href="cadastro.php?id=<?= $value['id'] ?>" class="btn btn-warning">Editar</a>
                                <a href="usuariodelete.php?id=<?= $value['id'] ?>" class="btn btn-danger">Apagar</a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
            <p class="mt-5 mb-3 text-body-secondary">&copy; Painel da Adega iDrink</p>

        </main>

</body>

</html>