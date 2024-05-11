<?php

    $host       = "localhost";
    $database   = "cadastro";
    $user       = "root";
    $senha      = "root";

    $conn = new pdo("mysql:host=$host;dbname=$database",$user,$senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function exibirNavbar($search){
        echo'<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../../SistemaEscolar/cursos/cursosBD.php">VEJA</a>
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
        ';
    
    
        
          if(isset($_SESSION['permission_level'])){

            if($_SESSION['permission_level'] == 'adm'){
              echo'<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Administrador
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../../SistemaEscolar/cadastros/cadastroCursos.php">Cadastrar um curso</a></li>
                <li><a class="dropdown-item" href="../../SistemaEscolar/pesquisa.php">Administrar pessoas</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../../SistemaEscolar/login.php">Logout</a></li>
              </ul>
            </li>';
            }

            else if($_SESSION['permission_level'] == 'prof'){
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
                <li><a class="dropdown-item" href="../../SistemaEscolar/login.php">Logout</a></li>
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
                <li><a class="dropdown-item" href="../../SistemaEscolar/login.php">Logout</a></li>
              </ul>
            </li>';
          }
          }
          else{
            echo'
          <li class="nav-item">
            <a class="nav-link" href="../../SistemaEscolar/cadastros/cadastroPrincipal.php">Cadastrar-se</a>
          </li>';
          }
          
          echo'
          <li class="nav-item">
            <a class="nav-link" href="../../SistemaEscolar/quemSomos.php">Quem Somos?</a>
          </li>
          
          
        </ul>
        ';

        if($search == true){
          echo'
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Digite aqui o que deseja" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name = "pesquisa">Pesquisar</button>
        </form>
        ';
        }
        echo '</div>
        </div>
        </nav>';
    }


    function exibirCarousel(){
        echo'<div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../../SistemaEscolar/img/realidadeVirtual.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../../SistemaEscolar/img/cursoDeJogos.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../../SistemaEscolar/img/teclado.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>';
    }

    function exibirFooter(){
        echo'<!-- Footer -->
        <footer class="text-center text-lg-start bg-dark text-light">
          <!-- Section: Social media -->
          <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
              <span>VEJA as nossas redes socias:</span>
            </div>
            <!-- Left -->
        
            <!-- Right -->
            <div>
              <a href="#" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="me-4 text-reset">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
            <!-- Right -->
          </section>
          <!-- Section: Social media -->
        
          <!-- Section: Links  -->
          <section class="">
            <div class="container text-center text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>V.E.J.A
                  </h6>
                  <p>
                    Agradeçemos pela sua atenção, a compania VEJA agradece e espera que tenha gostado do que tenha visto na pagina
                  </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    Alguns Cursos
                  </h6>
                  <p>
                    <a href="#" class="text-reset">Cyber Segurança</a>
                  </p>
                  <p>
                    <a href="#" class="text-reset">Desenvlvimento de sistemas</a>
                  </p>
                  <p>
                    <a href="#" class="text-reset">Ti-Hardware</a>
                  </p>
                  <p>
                    <a href="#" class="text-reset">Especialista em banco de dados</a>
                  </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    Links que podem ajudar
                  </h6>
                  <p>
                    <a href="quemSomos.php" class="text-reset">Quem Somos?</a>
                  </p>
                  <p>
                    <a href="cadastroPrincipal.php" class="text-reset">Cadastro</a>
                  </p>
                  <p>
                    <a href="login.php" class="text-reset">Login</a>
                  </p>
                  <p>
                    <a href="telaInicial.php" class="text-reset">Tela inicial</a>
                  </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
                  <p><i class="fas fa-home me-3"></i> SENAI Alvares Romi - SBO</p>
                  <p>
                    <i class="fas fa-envelope me-3"></i>
                    VEJACompany@gmail.com
                  </p>
                  <p><i class="fas fa-phone me-3"></i> +55 (19) 98888-4854</p>
                  <p><i class="fas fa-print me-3"></i> +55 (19) 12345-6789</p>
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row -->
            </div>
          </section>
          <!-- Section: Links  -->
        
          <!-- Copyright -->
          <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">VEJA</a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->';
    }