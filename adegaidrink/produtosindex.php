<?php
// Conectar ao banco de dados
$dsn = 'mysql:host=62.72.62.1;dbname=u687609827_idrink';
$username = 'u687609827_idrink';
$password = '0QJ0bq^O';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Não foi possível conectar ao banco de dados: ' . $e->getMessage());
}

// Buscar produtos
$sql = 'SELECT nome, img, preco, descricao FROM bebidas';
$stmt = $pdo->query($sql);
$bebidas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleproduto.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <title>BEBIDAS DA ADEGA IDRINK</title>
</head>

<body>
    <section>
        <div class="menu"></div>
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
        <main class="main-section">
            <section class="container normal-section">
                <h2 class="section-title">Bebidas</h2>

                <?php if (!empty($bebidas)) : ?>
                    <div class="products-container">
                        <?php foreach ($bebidas as $produto) : ?>
                            <div class="movie-product">
                                <strong class="product-title"><?php echo htmlspecialchars($produto['nome']); ?></strong>
                                <img src="<?php echo htmlspecialchars($produto['img']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>" class="product-image">
                                <p class="product-description"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                                <div class="product-price-container">
                                    <span class="product-price"><?php echo 'R$' . number_format($produto['preco'], 2, ',', '.'); ?></span>
                                    <button type="button" class="button-hover-background add-to-cart" data-name="<?php echo htmlspecialchars($produto['nome']); ?>" data-price="<?php echo htmlspecialchars($produto['preco']); ?>">
                                        Adicionar ao carrinho
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>Nenhum produto encontrado.</p>
                <?php endif; ?>
            </section>

            <section class="container normal-section">
                <h2 class="section-title">Carrinho</h2>

                <table class="cart-table">
                    <thead>
                        <tr>
                            <th class="table-head-item first-col">Item</th>
                            <th class="table-head-item second-col">Preço</th>
                            <th class="table-head-item third-col">Quantidade</th>
                            <th class="table-head-item fourth-col">Ação</th>
                        </tr>
                    </thead>

                    <tbody id="cart-items">
                        <!-- Itens do carrinho serão inseridos aqui -->
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="4" class="cart-total-container">
                                <strong>Total</strong>
                                <span id="cart-total">R$0,00</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <button type="button" class="purchase-button" id="finalize-purchase">Finalizar Compra</button>
            </section>
        </main>

        <script src="js/cart.js"></script> <!-- Inclua o JavaScript do carrinho -->
</body>

</html>
