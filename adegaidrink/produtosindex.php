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

// Verificar se há um parâmetro de pesquisa
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Criar a consulta com base no parâmetro de pesquisa
$sql = 'SELECT nome, img, preco, descricao FROM bebidas';
if ($search) {
    $sql .= ' WHERE nome LIKE :search';
}

$stmt = $pdo->prepare($sql);

if ($search) {
    $stmt->bindValue(':search', '%' . $search . '%');
}

$stmt->execute();
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

                <!-- Formulário de Pesquisa -->
                <form method="get" action="">
                    <input type="text" name="search" id="search-input" placeholder="Buscar bebidas..." value="<?php echo htmlspecialchars($search); ?>">
                    <button type="submit">Buscar</button>
                </form>

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
                        <!-- Exemplo de item do carrinho -->
                        <tr>
                            <td class="cart-item-name">Nome do Item</td>
                            <td class="cart-item-price">R$ 10,00</td>
                            <td class="cart-item-quantity">1</td>
                            <td class="cart-item-action">
                                <button type="button" class="remove-button">Remover</button>
                            </td>
                        </tr>
                        <!-- Outros itens do carrinho -->
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
        <script>
            // Filtragem de produtos em tempo real
            document.getElementById('search-input').addEventListener('input', function() {
                var filter = this.value.toLowerCase();
                var products = document.querySelectorAll('.movie-product');

                products.forEach(function(product) {
                    var title = product.querySelector('.product-title').textContent.toLowerCase();
                    if (title.includes(filter)) {
                        product.style.display = '';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });
        </script>
    </section>
</body>

</html>