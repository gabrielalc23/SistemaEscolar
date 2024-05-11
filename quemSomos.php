<?php
  include("./sessoes/sessao.php");
  include("./connection/connection.php");
  $search = false;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quem Somos?</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/quemSomos.css">

  <?php
    exibirNavbar(false);
  ?>
</head>

<body>

  <div class="container">
    <div class="child">
      <h1 class="p-5">Quem Somos?</h1>
      <br>
      <p class="d-flex">Somos uma escola de programação apaixonada por tecnologia e comprometida em formar a próxima geração de profissionais da área. Acreditamos que a programação é uma habilidade fundamental no mundo digital atual, e nossa missão é torná-la acessível a todos.</p>
      <br>
      <p class="d-flex">Oferecemos cursos para iniciantes e profissionais experientes, abrangendo uma ampla variedade de linguagens de programação e tecnologias. Nossa metodologia de ensino combina teoria e prática, com foco no desenvolvimento de habilidades para resolver problemas reais. Contamos com uma equipe de instrutores experientes e altamente qualificados, prontos para te guiar em sua jornada de aprendizado.</p>
      <br>
      <p class="d-flex">Além dos cursos, também oferecemos workshops, eventos e uma comunidade online para que você possa se conectar com outros entusiastas da programação. Estamos sempre inovando e atualizando nossos conteúdos para garantir que você aprenda as habilidades mais procuradas pelo mercado.</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
