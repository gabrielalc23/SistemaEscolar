<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="./styles/estilizarBtn.consultaTabela.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
</head>
<body>

<?php

include('../../Connection/connection.php');

class User {
    private $id;
    private $nome;
    private $nascimento;
    private $email;
    private $telefone;
    private $senha;
    private $permission;

    public function __construct($id, $nome, $nascimento, $email, $telefone, $senha, $permission) {
        $this->id = $id;
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->senha = $senha;
        $this->permission = $permission;
    }

    public function getFormEditar() {
        
        $html = '
        <div class="container">
            <h1>Editar Usuário</h1>
            <form action="Atualizar.php" method="POST">
                <input type="hidden" name="id" value="' . $this->id . '">
                <input type="hidden" name="redirect" value="ConsultaTabela.php">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="' . $this->nome . '">
                </div>
                <div class="form-group">
                    <label for="nascimento">Nascimento</label>
                    <input type="date" class="form-control" id="nascimento" name="nascimento" value="' . $this->nascimento . '">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="' . $this->email . '">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="number" class="form-control" id="telefone" name="telefone" value="' . $this->telefone . '">
                </div>
                <div class="form-group">
                <label for="Permissões">Tipo de usuário</label>
                    <select class="form-select form-select-sm mt-2" name="' . $this->permission . 'permission_level" class = "selectPerm">
                        <option value="adm">Administrador</option>
                        <option value="usr" selected>Usuário</option>
                        <option value="prof">Professor</option>
                    </select>
                <button type="submit" class="btn btn-primary mt-4">Atualizar</button>    
                </div>
                </form>
        </div>';
        return $html;
    }
}


if (isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT id, nome, data_nascimento, email, telefone, senha, permission_level FROM usuarios WHERE id =?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user):
        $userObject = new User($user["id"], $user["nome"], $user["data_nascimento"], $user["email"], $user["telefone"], $user["senha"], $user['permission_level']);
        echo $userObject->getFormEditar();

        if (isset($_POST['redirect'])) {
            $redirect = 'http://' . $_POST['redirect'];
            header('Location: ' . $redirect);
            exit;
        }
    endif;
}

?>

</body>

</html>