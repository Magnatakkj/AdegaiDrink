<?php
class Bebidas
{

    public function ListarBebidas()
    {
        $conn = new PDO("mysql:host=62.72.62.1;dbname=u687609827_idrink", "u687609827_idrink", "0QJ0bq^O");
        $script = "SELECT * FROM bebidas";

        $lista = $conn->query($script)->fetchAll();

        return $lista;
    }

    public function Listar1Bebidas($id_consulta)
    {

        $conn = new PDO("mysql:host=62.72.62.1;dbname=u687609827_idrink", "u687609827_idrink", "0QJ0bq^O");
        $script = "SELECT * FROM bebidas WHERE id = " . $id_consulta;

        $lista = $conn->query($script)->fetch();

        return $lista;
    }

    public function DeleteBebida($id_delete)
    {
        $conn = new PDO("mysql:host=62.72.62.1;dbname=u687609827_idrink", "u687609827_idrink", "0QJ0bq^O");
        $script = "DELETE FROM bebidas WHERE id = :id";

        $pre = $conn->prepare($script);

        $pre->execute([
            ":id" => $id_delete
        ]);

        return 1;
    }

    public function AtualizarBebida($id, $nome, $img, $preco, $descricao)
    {
        try {
            if (empty($nome)) {
                return "<br>Nome não informado";
            }

            if (empty($img)) {
                return "<br>Imagem não informada";
            }

            if (!is_numeric($preco) || $preco <= 0) {
                return "<br>Preço inválido";
            }

            $conn = new PDO("mysql:host=62.72.62.1;dbname=u687609827_idrink", "u687609827_idrink", "0QJ0bq^O");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $script = "UPDATE bebidas SET nome = :nome, img = :img, preco = :preco, descricao = :descricao WHERE id = :id";
            $preparo = $conn->prepare($script);

            $preparo->execute([
                ':nome' => $nome,
                ':img' => $img,
                ':preco' => $preco,
                ':descricao' => $descricao,
                ':id' => $id
            ]);

            header('Location: lista2.php');
            exit();
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
}
