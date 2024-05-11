<?php
include("./connection/connection.php");
include("./sessoes/sessaoAdm.php");

if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $descricaoCurta = $_POST['descricaoCurta'];
    $descricao = $_POST['descricao'];
    $duracao = $_POST['duracao'] ?? null;
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'] ?? null;
    $dataIni = $_POST['dataIni'] ?? null;
    $idadeMin = $_POST['idadeMin'] ?? null;
    $preReq = $_POST['preReq'] ?? null;
    $foto = $_FILES['foto'];

    if ($foto['error']) {
        die("falha ao enviar arquivo");
    }
    if ($foto['size'] > 3145728) {
        die("arquivo grande demais!! max:3mb");
    }

    string $pasta = dirname(__DIR__)  . './fotos';
    $nomeOriginal = $foto['name'];
    $novoNome = uniqid() . '.' . pathinfo($nomeOriginal, PATHINFO_EXTENSION);
    $dataAtual = date('Y-m-d');
    $diretorio = $pasta . $novoNome;

    if ($foto['type'] !== 'image/jpeg' && $foto['type'] !== 'image/png') {
        die("tipo de arquivo inválido");
    }

    if (!move_uploaded_file($foto['tmp_name'], $diretorio)) {
        die("erro ao salvar imagem");
    }

    $pesq = $conn->prepare("INSERT INTO fotos(nome_original, diretorio, nome, data_upload) VALUES (?, ?, ?, ?)");
    $pesq->execute([$nomeOriginal, $diretorio, $novoNome, $dataAtual]);

    $sql = $conn->prepare("INSERT INTO cursos(nome, descricao_curta, descricao, duracao, tipo, preco, data_inicio, idade_min, pre_requisito, foto) 
                                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->execute([
        $nome,
        $descricaoCurta,
        $descricao,
        $duracao,
        $tipo,
        $preco,
        $dataIni,
        $idadeMin,
        $preReq,
        $diretorio
    ]);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar um Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"      rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- navbar -->
    <?php
      exibirNavbar(false);
    ?>
  </head>
  <body>
<div class = "container">
    <div class = "row">
        <div class = "column">
            <form action = "" method = "post" enctype="multipart/form-data">

              <div class = "form-group">
                <label for ="nome" >Nome</label>
                <input type = "text" class = "form-control" name = "nome" required>
              </div>

              <div class = "form-group">
                <label for ="descricaoCurta" >Descrição Curta</label>
                <input type = "text" class = "form-control" name = "descricaoCurta" required>
              </div>
              
              <div class = "form-group">
                <label for ="descricao" >Descrição</label>
                <input type = "text" class = "form-control" name = "descricao" required>
              </div>

              <div class = "form-group">
                <label for ="duracao" >Duração em Horas</label>
                <input type = "text" class = "form-control" name = "duracao" required>
              </div>

              <div class = "form-group">
                <p>Tipo de curso (Aulas gravadas ou Aulas ao vivo)</p>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="ao vivo">
                  <label class="form-check-label" for="inlineRadio1">Aulas ao vivo</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="gravado">
                  <label class="form-check-label" for="inlineRadio2">Aulas gravadas</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" id="inlineRadio3" value="ambos">
                  <label class="form-check-label" for="inlineRadio3">Ambos</label>
                </div>
              </div>

              <div class = "form-group">
                <label for ="preco" >Preço em reais</label>
                <input type = "text" class = "form-control" name = "preco">
              </div>

              <div class = "form-group">
                <label for ="dataIni" >Data de início (Apenas se for aula ao vivo)</label>
                <input type = "date" class = "form-control" name = "dataIni">
              </div>
              
              <div class = "form-group">
                <label for ="preReq" >Pré-requisitos</label>
                <input type = "text" class = "form-control" name = "preReq">
              </div>
              
              <div class = "form-group">
                <label for ="idadeMin" >Idade mínima</label>
                <input type = "text" class = "form-control" name = "idadeMin">
              </div>
              
              <div class = "form-group">
                <label for ="foto" >Foto ilustrativa do curso</label>
                <input type = "file" class = "form-control" name = "foto" required>
              </div>

