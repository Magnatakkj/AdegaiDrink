<?php
// Configurações do banco de dados
$servername = "62.72.62.1";
$username = "u687609827_idrink"; // Substitua pelo seu usuário do banco de dados
$password = "0QJ0bq^O"; // Substitua pela sua senha do banco de dados
$dbname = "u687609827_idrink";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
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
    $stmt = $conn->prepare("INSERT INTO bebidas (nome, img, preco, descricao) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nome, $imgRelativePath, $preco, $descricao);

    if ($stmt->execute()) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
