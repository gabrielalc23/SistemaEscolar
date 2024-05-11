<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de alunos</title>
</head>
<body>
<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark container col-sm-6 col-md-8 col-lg-8">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">NASCIMENTO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TELEFONE</th>
                <th scope="col">EDITAR</th>
                <th scope="col">NÍVEL</th>
                <th scope="col">EDITAR</th>
                <th scope="col">DELETAR</th>
            </tr>
        </thead>
        <tbody>    
<?php
require_once('LayoutPadrao.php');
include('../../Connection/connectionveja.php');
?>
<a class="btn btn-outline-info mb-3" href="../../pesquisa.php" >Retornar ao design anterior</a>

<?php
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
        $html = '<form action="Editar.php" method="post">';
        $html.= '<input type="hidden" name="id" value="'.               $this->id. '">';
        $html.= '<input type="hidden" name="nome" value="'.             $this->nome. '">';
        $html.= '<input type="hidden" name="nascimento" value="'.       $this->nascimento. '">';
        $html.= '<input type="hidden" name="email" value="'.            $this->email. '">';
        $html.= '<input type="hidden" name="telefone" value="'.         $this->telefone. '">';
        $html.= '<input type="hidden" name="permission_level" value="'. $this->permission. '">';
        $html.= '<button type="submit" class="bg-warning rounded" name="editar" style="border: none; background-color: transparent;">';
        $html.= '<img style="cursor: pointer; border: none;" id="img-lapis" class="img-thumbnail bg-warning" src="../img/pencil.png" width="40">';
        $html.= '</button>';
        $html.= '</form>';
        return $html;
    }

    public function getFormExcluir() {
        $html = '<form action="Excluir.php" method="post">';
        $html.= '<button class="bg-danger rounded" name="excluir" style="border: none; background-color: transparent;">';
        $html.= '<img style="cursor: pointer; border: none;" id="img-lapis" class="bg-danger img-thumbnail" src="../img/trash.png" width="40">';
        $html.= '</button>';
        $html.= '<input type="hidden" name="id" value="'. $this->id. '">';
        $html.= '</form>';
        return $html;
    }
  
}

$sql = "SELECT id, nome, data_nascimento, email, telefone, senha, permission_level FROM usuarios WHERE nome <> 'admin'";

$stmt = $conn->prepare($sql);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user):
    $userObject = new User($user["id"], $user["nome"], $user["data_nascimento"], $user["email"], $user["telefone"], $user["senha"], $user['permission_level']);
    echo '
            <tr>
                <td>'. $user["id"]. '</td>
                <td>'. $user["nome"]. '</td>
                <td>'. date('d/m/Y', strtotime($user['data_nascimento'])). '</td>
                <td>'. $user["email"]. '</td>
                <td>'. $user['telefone'] .'</td>
                <td>'. $user['telefone'] .'</td>
                <td>' .$user['permission_level']. '</td>
                <td>'. $userObject->getFormEditar(). '</td>
                <td>'. $userObject->getFormExcluir(). '</td>
            </tr>';
endforeach;
echo '
        </tbody>
    </table>
</div>';

$conn = null;

?>
</body>
</html>