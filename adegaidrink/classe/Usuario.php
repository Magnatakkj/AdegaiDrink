<?php
class Usuario
{

    public function ListarUsuarios()
    {
        $conn = new PDO("mysql:host=62.72.62.1;dbname=u687609827_idrink", "u687609827_idrink", "0QJ0bq^O");
        $script = "SELECT * FROM tb_usuarios";

        $lista = $conn->query($script)->fetchAll();

        return $lista;
    }


    public function Listar1Usuarios($id_consulta)
    {

        $conn = new PDO("mysql:host=62.72.62.1;dbname=u687609827_idrink", "u687609827_idrink", "0QJ0bq^O");
        $script = "SELECT * FROM tb_usuarios WHERE id = " . $id_consulta;

        $lista = $conn->query($script)->fetch();

        return $lista;
    }

    public function DeleteUsuario($id_delete)
    {
        $conn = new PDO("mysql:host=62.72.62.1;dbname=u687609827_idrink", "u687609827_idrink", "0QJ0bq^O");
        $script = "DELETE FROM tb_usuarios WHERE id = :id";

        $pre = $conn->prepare($script);

        $pre->execute([
            ":id" => $id_delete
        ]);

        return 1;
    }

    public function AtualizarUsuario(/*$nome, */$user, $password, $passwordConfirm, $id_para_alterar)
        {
    
            try {
    
                // if (empty($nome) || $nome == null) {
                //     return "<br>Nome não informado";
                // }
    
                if (empty($user) || $user == null) {
                    return "<br>Usuário não informado";
                }
    
                if (empty($password) || $password == null) {
                    return "<br>Senha não informada";
                }
    
                if ($password != $passwordConfirm) {
                    return "<br>Senhas não são iguias";
                }
    
                $conn = new PDO("mysql:host=62.72.62.1;dbname=u687609827_idrink", "u687609827_idrink", "0QJ0bq^O");
                $script = "UPDATE tb_usuarios SET /*nome = :nome */ usuario = :usuario, senha = :senha WHERE id = :id ";
                $preparo = $conn->prepare($script);
    
                $preparo->execute([
    
                    // ':nome' => $nome,
    
                    ':usuario' => $user,
                    ':senha' => $password,
                    ':id' => $id_para_alterar
                ]);
    
                header('location:lista.php');
            } catch (PDOException $erro) {
                echo "Seguinte, deu erro no negocio do treco <br>" . $erro->getMessage();
            }
        }

}