<?php

include 'include/header.php';
include 'classe/Produtos.php';

$nome = new Bebidas();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_alterar = $_GET['id'];
    $dadosBebida = $nome->Listar1Bebidas($id_alterar);
}

?>

<body class="d-flex align-items-center py-4 bg-body-tertiary cadastro">

    <main class="form-signin w-100 m-auto">
        <form action="auxcadastrobebida.php" method="POST">
            <h1 class="h3 mb-3 fw-normal"><?= isset($id_alterar) ? 'Alterar Informações' : 'Dados de Cadastro' ?></h1>
            
            <input type="hidden" name="id_para_alterar" value="<?= isset($id_alterar) ? $dadosBebida['id'] : '' ?>">

            <div class="form-floating my-2">
                <input value="<?= isset($id_alterar) ? htmlspecialchars($dadosBebida['nome']) : '' ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                <label for="nome">Nome</label>
            </div>

            <div class="form-floating my-2">
                <input value="<?= isset($id_alterar) ? htmlspecialchars($dadosBebida['img']) : '' ?>" type="text" class="form-control" id="img" name="img" placeholder="Imagem">
                <label for="img">Imagem</label>
            </div>

            <div class="form-floating my-2">
                <input value="<?= isset($id_alterar) ? htmlspecialchars($dadosBebida['preco']) : '' ?>" type="text" class="form-control" id="preco" name="preco" placeholder="Preço">
                <label for="preco">Preço</label>
            </div>

            <!-- Novo campo para Descrição -->
            <div class="form-floating my-2">
                <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição" rows="3"><?= isset($id_alterar) ? htmlspecialchars($dadosBebida['descricao']) : '' ?></textarea>
                <label for="descricao">Descrição</label>
            </div>

            <input class="btn btn-primary w-100 py-2 mt-5" type="submit" value="<?= isset($id_alterar) ? 'Alterar' : 'Cadastrar' ?>">

            <p class="mt-5 mb-3 text-body-secondary">&copy; Painel da Adega iDrink</p>
        </form>
    </main>

</body>

</html>