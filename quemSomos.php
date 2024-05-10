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

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../SistemaEscolar/telaInicial.php">VEJA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../SistemaEscolar/telaInicial.php">Inicío</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../SistemaEscolar/cursos/cursosBD.php">Cursos</a>
          </li>


          <?php
          if(isset($_SESSION['perm'])){

            if($_SESSION['perm'] == 'adm'){
              echo'<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Administrador
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./cadastroCursos.php">Cadastrar um curso</a></li>
                <li><a class="dropdown-item" href="./pesquisa.php">Administrar usuarios</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="./login.php">Logout</a></li>
              </ul>
            </li>';
            }

            elseif($_SESSION['perm'] == 'prof'){
              echo'<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Professor
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gerenciar meus Cursos</a></li>
                <li><a class="dropdown-item" href="#">Administrar Alunos</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="./login.php">Logout</a></li>
              </ul>
            </li>';
          }

          else{
            echo'<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Meu Perfil
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">'.$_SESSION['nome'].'</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="./login.php">Logout</a></li>
              </ul>
            </li>';
          }
          }
          else{
            echo'
          <li class="nav-item">
            <a class="nav-link" href="./cadastroPrincipal.php">Cadastrar-se</a>
          </li>';

          }
          ?>

          <li class="nav-item">
            <a class="nav-link" href="../../SistemaEscolar/quemSomos.php">Quem Somos?</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="./termos.php">Termos de uso</a>
          </li>
        </ul>

        <?php
        if($search == true){
          echo'
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Digite aqui o que deseja" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name = "pesquisa">Pesquisar</button>
        </form>
        ';
        }
        ?>

      </div>
    </div>
  </nav>
</head>



<body>

    <div class = "container">
        <div class = "child">
          <h2>Como começou</h2>
        </div>
    </div>
          

</body>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>