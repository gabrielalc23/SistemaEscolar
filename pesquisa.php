<?php 
  include "./sessoes/sessaoAdm.php";
  include "./connection/connection.php";
  $search = true;
  $busca = $_POST['busca']??'';

  
  if($busca == ''){
    $sql = $conn->prepare("select id,nome,email,telefone,especialidade,data_nascimento,cpf,rg,perm from usuarios");
    $sql->execute();
    $todos = true;
  }
  
  else{
    $sql = $conn->prepare("select id,nome,email,telefone,especialidade,data_nascimento,cpf,rg,perm from usuarios where nome like :busca");
    $sql->execute(array(
      ':busca' => $busca
    ));
    
    $_SESSION['ultBusca'] = $busca;
    $todos = false;
  }
  
  if(isset($_POST['editar']) && $todos == false){
    $busca = $_SESSION['ultBusca'] ?? '';

    if($busca){
      echo'=========================================';
      $sql = $conn->prepare("select id,nome,email,telefone,especialidade,data_nascimento,cpf,rg,perm from usuarios where nome like :busca");
      $sql->execute(array(
        ':busca' => $busca
      ));
    }
  }
 
    
    $resulBusca = $sql->fetchAll(PDO::FETCH_ASSOC);

  if (isset($_POST['editar'])){
    $idEditar = $_POST['editar'];
  }else{
    $idEditar = null;
  }


  if(isset($_POST['salvar'])){
    $idEditar           = $_POST["salvar"];
    $idAltNome          = $_POST[$idEditar."nome"];
    $idAltEmail         = $_POST[$idEditar."email"];
    $idAltTelefone      = $_POST[$idEditar."telefone"];
    $idAltEspecialidade = $_POST[$idEditar."especialidade"];
    $idAltdata_nascimento      = $_POST[$idEditar."data_nascimento"];
    $idAltCpf           = $_POST[$idEditar."cpf"];
    $idAltRg            = $_POST[$idEditar."rg"];
    $idAltPerm          = $_POST[$idEditar."perm"];

    $alt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, especialidade = :especialidade, data_nascimento = :data_nascimento , cpf = :cpf, rg = :rg, perm = :perm  WHERE id = :idEditar;");
    $alt -> execute(array(
      ':idEditar'       => $idEditar,
      ':email'          => $idAltEmail,
      ':telefone'       => $idAltTelefone,
      ':especialidade'  => $idAltEspecialidade,
      ':data_nascimento'       => $idAltdata_nascimento,
      ':nome'           => $idAltNome,
      ':cpf'            => $idAltCpf,
      ':rg'             => $idAltRg,
      ':perm'           => $idAltPerm
    ));

    $idEditar = null;
    header("Location: {$_SERVER['PHP_SELF']}");
  }


  if (isset($_POST['deletar'])){
    $idDel = $_POST['deletar'];

    $del = $conn->prepare("delete from usuarios where id  = :idDel");
    $del -> execute(array(
      ':idDel' => $idDel
    ));

    header("Location: {$_SERVER['PHP_SELF']}");
    $idDel = null;
  }
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Projeto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">VEJA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./telaInicial.php">Inicío</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./cursosBD.php">Cursos</a>
          </li>


          <?php
          if(isset($_SESSION['perm'])){
            
            if($_SESSION['perm'] == 'adm'){
              echo'<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Administrador
              </a>
              <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../../SistemaEscolar/cadastros/cadastroCursos.php">Cadastrar um curso</a></li>
              <li><a class="dropdown-item" href="../../SistemaEscolar/pesquisa.php">Administrar usuarios</a></li>
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
            <a class="nav-link" href="./quemSomos.php">Quem Somos?</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="./termos.php">Termos de uso</a>
          </li>
        </ul>

        <?php
        if($search == true){
          echo"
          <form class='d-flex' role='search' method = 'post' action = '#'>
          <input class=\"form-control me-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\" name = \"busca\" autofocus value = \"$busca\">
          <button class='btn btn-outline-success' type='submit' name = 'pesquisa'>Pesquisar</button>
          </form>
          ";
        }
        ?>

      </div>
    </div>
  </nav>
</head>


<body>
  <div class="container d-flex justify-content-center">
    <div class="row">
      <div class="column">
       
        <div class="form-group">
          <form action="#" method = "post">

          </form>
        </div>
        <table class="table table-hover">
        <thead class="">
          <label class = "mt-1">
            <a href = "../../SistemaEscolar/PaginaAdm">
              <button type = "button" class = "btn btn-primary">Pesquisa alternativa</button>
            </a>
          <h1>Pesquisa</h1>
        </label>
            <tr class="">
              <th class = "tdTabela" scope="col">Id</th>                 
              <th class = "tdTabela" scope="col">Nome</th>               
              <th class = "tdTabela" scope="col">Email</th>              
              <th class = "tdTabela" scope="col">Telefone</th>           
              <th class = "tdTabela" scope="col">Especialidade</th>      
              <th class = "tdTabela" scope="col">Data de nascimento</th> 
              <th class = "tdTabela" scope="col">Cpf</th> 
              <th class = "tdTabela" scope="col">RG</th> 
              <th class = "tdTabela" scope="col">Permissão</th> 
              <th class = "tdTabela" scope="col">Editar</th> 
              <th class = "tdTabela" scope="col">Deletar</th> 
            </tr>
         </thead>
          <tbody>
            <?php

                if (!empty($resulBusca)) {
                  foreach ($resulBusca as $linha) {
                    $id             = $linha['id'];
                    $nome           = $linha['nome'];
                    $email          = $linha['email'];
                    $telefone       = $linha['telefone'];
                    $especialidade  = $linha['especialidade'];
                    $data_nascimento       = $linha['data_nascimento'];
                    $cpf            = $linha['cpf'];
                    $rg             = $linha['rg'];
                    $perm           = $linha['perm'];
                    if($idEditar == $id){
                      echo"<form method = \"post\" action = \"#\"><tr>
                          <th scope=\"row\">$id</th>
                          <td><input type = \"text\" id = \"inputt\" name = \"".$id."nome\" value = \"$nome\"></td>
                          <td><input type = \"text\" id = \"inputt\" name = \"".$id."email\" value = \"$email\"></td>
                          <td><input type = \"text\" id = \"inputt\" name = \"".$id."telefone\" value = \"$telefone\"></td>
                          <td><input type = \"text\" id = \"inputt\" name = \"".$id."especialidade\" value = \"$especialidade\"></td>
                          <td><input type = \"text\" id = \"inputt\" name = \"".$id."data_nascimento\" value = \"$data_nascimento\"></td>
                          <td><input type = \"text\" id = \"inputt\" name = \"".$id."cpf\" value = \"$cpf\"></td>
                          <td><input type = \"text\" id = \"inputt\" name = \"".$id."rg\" value = \"$rg\"></td>
                          <td><select id=\"inputt\" name=\"".$id."perm\" class = \"selectPerm\">
                          <option value=\"adm\">Administrador</option>
                          <option value=\"usr\">Usuário</option>
                          <option value=\"prof\">Professor</option>
                        </select></td>
                          <td><button type = \"submit\" class = \"btn btn-success\" name = \"salvar\" value = \"$id\">salvar</button></td>
                          <td><button type = \"submit\" class = \"btn btn-danger\" name = \"deletar\" value = \"$id\">deletar</button></td></td>
                        </tr></form>";
                    }else{
                      echo"<form method = \"post\" action = \"#\"><tr>
                          <th scope=\"row\">$id</th>
                          <td class = \"tdTabela\">$nome</td>
                          <td class = \"tdTabela\">$email</td>
                          <td class = \"tdTabela\">$telefone</td>
                          <td class = \"tdTabela\">$especialidade</td>
                          <td class = \"tdTabela\">$data_nascimento</td>
                          <td class = \"tdTabela\">$cpf</td>
                          <td class = \"tdTabela\">$rg</td>
                          <td class = \"tdTabela\">$perm</td>
                          <td class = \"tdTabela\"><button type = \"submit\" class = \"btn btn-primary\" name = \"editar\" value = \"$id\">editar</button></td>
                          <td class = \"tdTabela\"><button type = \"submit\" class = \"btn btn-danger\" name = \"deletar\" value = \"$id\">deletar</button></td></td>
                        </tr></form>";
                    }
                  }
                }
            ?> 
            
          </tbody>
        </table>
        <div class="form-group">
          <a href="telaInicial.php" class="btn btn-primary">Tela inicial</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>

  <?php
    // exibirFooter();
  ?>

</body>

</html>