<?php
  include ("../../SistemaEscolar/connection/connection.php");
  include ("../../SistemaEscolar/sessoes/sessao.php");

  if(isset($_POST['atualizar'])){
    $idSalvar           = $_POST['idSalvar'];
    $nome               = $_POST['nome'];
    $descricao          = $_POST['descricao'];
    $descricao_curta    = $_POST['descricao_curta'];
    $duracao            = $_POST['duracao'];
    $tipo               = $_POST['tipo'];
    $preco              = $_POST['preco'];
    $data_inicio        = $_POST['data_inicio'];
    $idade_min          = $_POST['idade_min'];
    $pre_requisito      = $_POST['pre_requisito'];

    $atualizar = $conn->prepare("UPDATE cursos SET nome=:nome, descricao=:descricao, descricao_curta=:descricao_curta, duracao=:duracao, tipo=:tipo, preco=:preco, data_inicio=:data_inicio, idade_min=:idade_min, pre_requisito=:pre_requisito WHERE id=:id");   
     $atualizar -> execute(array(
    ':id'               => $idSalvar,
    'nome'              => $nome,
    'descricao'         => $descricao,
    'descricao_curta'   => $descricao_curta,
    'duracao'           => $duracao,
    'tipo'              => $tipo,
    'preco'             => $preco,
    'data_inicio'       => $data_inicio,
    'idade_min'         => $idade_min,
    'pre_requisito'     => $pre_requisito

));

    header('location:admCursos.php');

  }

  $id = $_POST['editar'];

  $sql = $conn->prepare('SELECT * FROM cursos where id = :id');
  $sql->execute(array(
    ':id'=> $id
  ));
  $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

  foreach ($sql as $row) {
    $nome               = $row['nome'];
    $descricao          = $row['descricao'];
    $descricao_curta    = $row['descricao_curta'];
    $duracao            = $row['duracao'];
    $tipo               = $row['tipo'];
    $preco              = $row['preco'];
    $data_inicio        = $row['id'];
    $idade_min          = $row['idade_min'];
    $pre_requisito      = $row['pre_requisito'];

  }

?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tela Inicial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- navbar -->
  <?php
    exibirNavbar(false);
  ?>


</head>

<body>
  
<div class = "container">
    <div class = "row">
        <div class = "column">
            <form action = "#" method = "post">

              <div class = "form-group">
                <label for ="nome" >Nome</label>
                <input type = "text" class = "form-control" name = "nome" value = "<?php echo $nome; ?>" required>
              </div>

              <div class = "form-group">
                <label for ="descricaoCurta" >Descrição Curta</label>
                <input type = "text" class = "form-control" name = "descricao_curta" value = "<?php echo $descricao_curta; ?>" required>
              </div>
              
              <div class = "form-group">
                <label for ="descricao" >Descrição</label>
                <input type = "text" class = "form-control" name = "descricao"value = "<?php echo $descricao; ?>"required>
              </div>

              <div class = "form-group">
                <label for ="duracao" >Duração em Horas</label>
                <input type = "text" class = "form-control" name = "duracao" value = "<?php echo $duracao; ?>"required>
              </div>

              <div class = "form-group">
                <p>Tipo de curso (Aulas gravadas ou Aulas ao vivo)</p>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="ao vivo"<?php
                    if($tipo == 'ao vivo'){
                        echo'checked';
                    }
                  ?>
                  >
                  <label class="form-check-label" for="inlineRadio1">Aulas ao vivo</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="gravado"<?php
                    if($tipo == 'gravado'){
                        echo'checked';
                    }
                  ?>
                  >
                  <label class="form-check-label" for="inlineRadio2">Aulas gravadas</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" id="inlineRadio3" value="ambos"<?php
                    if($tipo == 'ambos'){
                        echo'checked';
                    }
                  ?>
                  >
                  <label class="form-check-label" for="inlineRadio3">Ambos</label>
                </div>
              </div>

              <div class = "form-group">
                <label for ="preco" >Preço em reais</label>
                <input type = "text" class = "form-control" name = "preco" value = "<?php echo $preco; ?>">
              </div>

              <div class = "form-group">
                <label for ="dataIni" >Data de início (Apenas se for aula ao vivo)</label>
                <input type = "date" class = "form-control" name = "data_inicio" value = "<?php echo $data_inicio; ?>">
              </div>
              
              <div class = "form-group">
                <label for ="preReq" >Pré-requisitos</label>
                <input type = "text" class = "form-control" name = "pre_requisito" value = "<?php echo $pre_requisito; ?>">
              </div>
              
              <div class = "form-group">
                <label for ="idadeMin" >Idade mínima</label>
                <input type = "text" class = "form-control" name = "idade_min" value = "<?php echo $idade_min; ?>">
              </div>

              <input type="hidden" name="idSalvar" value = "<?php echo $id; ?>">

              <div class = "form-group mt-4">
                <button type="submit" class="btn btn-success" name = "atualizar" value = "<?php echo $id; ?>">Atualizar</button>
              </div>
              
            </form>
        </div>
    </div>
</div>


  <?php
    exibirFooter();
  ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>