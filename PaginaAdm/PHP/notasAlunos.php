<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veja bem</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
<div class="container mb-0">
    
<table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark container">
        
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">NASCIMENTO</th>
            <th scope="col">EMAIL</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">Notas</th>
        </tr>
    </thead>
    <tbody>
<?php
require_once ('LayoutPadrao.php');
include ('../../../SistemaEscolar/connection/connection.php');

class User
{
    private $id;
    private $nome;
    private $nascimento;
    private $email;
    private $telefone;
    private $senha;

    public function __construct($id, $nome, $nascimento, $email, $telefone, $senha)
    {
        $this->id         = $id;
        $this->nome       = $nome;
        $this->nascimento = $nascimento;
        $this->email      = $email;
        $this->telefone   = $telefone;
        $this->senha      = $senha;
    }
}

$showStudent = "SELECT * FROM usuarios WHERE nome <> 'admin'";
$stmt = $conn->prepare($showStudent);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user):
    $userObject = new User($user["id"], $user["nome"], $user["data_nascimento"], $user["email"], $user["telefone"], $user["senha"]);
    echo '
            <tr>
                <td>' . $user["id"] . '</td>
                <td>' . $user["nome"] . '</td>
                <td>'. date('d/m/Y', strtotime($user['data_nascimento'])). '</td>
                <td>' . $user["email"] . '</td>
                <td>' . $user["telefone"] . '</td>
                <td>
                <button class="btn btn-warning" ONCLICK="chamaNotas('. $user["id"].')">
                Setar notas
                </button>
                </td>
            </tr>';
            
endforeach;
echo '</table>
</tbody>';
?>
<form ACTION="setarNota.php" METHOD="post">
    <input TYPE="hidden" NAME="idAluno" ID="idAluno" />
</form>
</body>
</html>
<script>
    function chamaNotas(id){
        document.getElementById("idAluno").value = id;
        document.forms[0].submit();
    }
</script>