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



<div class="products-container">
    <?php foreach ($bebidas as $produto): ?>
        <div class="movie-product">
            <strong class="product-title"><?php echo htmlspecialchars($produto['nome']); ?></strong>
            <img src="<?php echo htmlspecialchars($produto['img']); ?>" alt="<?php echo htmlspecialchars($produto['img']); ?>" class="product-image">
            <p class="product-description"><?php echo htmlspecialchars($produto['descricao']); ?></p>
            <div class="product-price-container">
                <span class="product-price"><?php echo 'R$' . number_format($produto['preco'], 2, ',', '.'); ?></span>
                <button type="button" class="button-hover-background">Adicionar ao carrinho</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>



