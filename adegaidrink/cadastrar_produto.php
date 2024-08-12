<?php
// Configurações do banco de dados
$dsn = "mysql:host=62.72.62.1;dbname=u687609827_idrink";
$username = "u687609827_idrink";
$password = "0QJ0bq^O";

// Cria conexão
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao']; // Adiciona a descrição

    // Verifica se a imagem foi enviada
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $imgName = $_FILES['img']['name'];
        $imgTmpName = $_FILES['img']['tmp_name'];

        // Define o diretório e o caminho para onde a imagem será movida
        $imgDir = 'img/';
        $imgPath = $imgDir . basename($imgName);

        // Cria o diretório 'img' se ele não existir
        if (!is_dir($imgDir)) {
            mkdir($imgDir, 0777, true);
        }

        // Move o arquivo para o diretório 'img'
        if (move_uploaded_file($imgTmpName, $imgPath)) {
            // Define o caminho relativo para armazenar no banco de dados
            $imgRelativePath = 'img/' . basename($imgName);
        } else {
            echo "Erro ao mover o arquivo para o diretório 'img'.";
            $imgRelativePath = ''; // Define como vazio em caso de erro
        }
    } else {
        $imgRelativePath = ''; // Caso a imagem não seja obrigatória
    }

    // Prepara e executa a inserção no banco de dados
    $sql = "INSERT INTO bebidas (nome, img, preco, descricao) VALUES (:nome, :img, :preco, :descricao)";
    $stmt = $conn->prepare($sql);

    // Executa a declaração com os parâmetros
    try {
        $stmt->execute([
            ':nome' => $nome,
            ':img' => $imgRelativePath,
            ':preco' => $preco,
            ':descricao' => $descricao
        ]);
        echo "Produto cadastrado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    // Fecha a conexão
    $conn = null;
}
?>
