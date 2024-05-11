<?php
include("../../SistemaEscolar/connection/connection.php");
include("../../SistemaEscolarsessoes/sessao.php");
  $search = false;
  $busca = $conn->prepare("SELECT * FROM cursos");
  $busca->execute();

  $busca = $busca->fetchAll(PDO::FETCH_ASSOC);

  if(isset($_POST['excluir'])){
    $del = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
    $del->execute(array(
      ':id' => $_POST['excluir']
    ));
    header("Location: {$_SERVER['PHP_SELF']}");
  }
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrar Cursos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php
        exibirNavbar(false);
    ?>

</head>

<body>
  <div class = "container">
    <h1>Administrar Cursos</h1>
    <table class = "table table-hover bg-dark">
      <th class = "tdTabela" scope="col">ID</th>
      <th class = "tdTabela" scope="col">Nome</th>
      <th class = "tdTabela" scope="col">Duração</th>
      <th class = "tdTabela" scope="col">Tipo</th>
      <th class = "tdTabela" scope="col">Preço</th>
      <th class = "tdTabela" scope="col">Idade Mínima</th>
      <th class = "tdTabela" scope="col">Pre requisitos</th>
      <th class = "tdTabela" scope="col">Editar</th>
      <th class = "tdTabela" scope="col">Excluir</th>
    <?php
    foreach($busca as $curso){
      $id             = $curso['id'];
      $nome           = $curso['nome'];
      $duracao        = $curso['duracao'];
      $tipo           = $curso['tipo'];
      $preco          = $curso['preco'];
      $idade_min      = $curso['idade_min'];
      $pre_requisito  = $curso['pre_requisito'];

      echo"
      <tr>
        <th class = \"tdTabela\" scope=\"row\">$id</th>
        <td class = \"tdTabela\">$nome</td>
        <td class = \"tdTabela\">$duracao</td>
        <td class = \"tdTabela\">$tipo</td>
        <td class = \"tdTabela\">$preco</td>
        <td class = \"tdTabela\">$idade_min</td>
        <td class = \"tdTabela\">$pre_requisito</td>
        <form action = \"./editarCurso.php\" method = \"post\">
        <td class = \"tdTabela\"><button type = \"submit\" class = \"btn btn-primary\" name = \"editar\" value = \"$id\">Editar</button></td>
        </form>
        <form action = \"#\" method = \"post\">
        <td class = \"tdTabela\"><button type = \"submit\" class = \"btn btn-danger\" name = \"excluir\" value = \"$id\">Excluir</button></td>
        </form>
      </tr>
      ";
    }
  ?>
  </table>
  </div>
    <?php
        exibirFooter();
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>